<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use App\Models\Bandwidth;
use App\Models\Client;
use App\Models\Reseller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Throwable;

class ClientController extends Controller
{
    /**
     * Show table of client
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::with([
            'user:id,fullname,username,photo,phone_number,address',
            'bandwidth:id,name',
        ])->whereHas('reseller', function ($q) {
            $q->where('user_id', Auth::id());
        })->paginate();

        return view('pages.reseller.client.index', [
            'title' => 'Tambah Pelanggan',
            'clients' => $clients,
        ]);
    }

    /**
     * Show create clients form
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $plans = Bandwidth::whereHas('reseller', function ($q) {
            $q->where('user_id', Auth::id());
        })->latest()->get();

        return view('pages.reseller.client.create', [
            'title' => 'Tambah Pelanggan',
            'plans' => $plans,
        ]);
    }

    /**
     * Store data process
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bandwidts = Bandwidth::whereHas('reseller', function ($q) {
            $q->where('user_id', Auth::id());
        })->select('id')->get();

        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required|alpha_dash|regex:/^[A-Za-z0-9_]+$/|unique:users,username',
            'email' => 'nullable|email:rfc,dns',
            'phoneNumber' => 'nullable|numeric',
            'password' => 'required|confirmed',
            'owner_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'address' => 'nullable',
            'photo' => 'nullable|image|max:1024',
            'plan' => [
                'required',
                Rule::in(Arr::pluck($bandwidts->toArray(), 'id')),
            ],
            'ppn' => 'nullable',
        ]);

        $photoPath = null;

        try {
            if ($request->hasFile('photo')) {
                $logo = Image::make($request->file('photo'));
                $logo->fit($logo->width());

                $photoPath = 'images/client/' . Str::slug($request->input('name')) . time() . '.webp';

                Storage::disk('public')->put(
                    $photoPath,
                    $logo->encode('webp')
                );
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage(), $e->getTrace());
        }

        try {
            DB::transaction(function () use ($request, $photoPath) {
                $user = new User([
                    'fullname' => $request->input('fullname'),
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'birthday' => $request->input('birth'),
                    'gender' => $request->input('gender'),
                    'address' => $request->input('address'),
                    'photo' => $photoPath ? 'storage/' . $photoPath : null,
                ]);

                $user->save();
                $user->assignRole('Client');

                $user->client()->save(new Client([
                    'bandwidth_id' => $request->input('plan'),
                    'reseller_id' => Reseller::whereHas('user', fn ($q) => $q->where('user_id', Auth::id()))->first()->id,
                    'payment_due_date' => 25,
                    'is_ppn' => $request->has('ppn'),
                ]));
            }, 5);
        } catch (\Throwable $e) {
            Log::critical($e->getMessage(), $e->getTrace());
            abort(500, $e->getMessage());
        } finally {
            return redirect()
            ->route('reseller_owner.client')
            ->with('status', 'Pelanggan ' . $request->input('fullname') . ' Telah Ditambahkan');
        }
    }
}
