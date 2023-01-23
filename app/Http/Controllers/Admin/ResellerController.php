<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reseller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Log;

class ResellerController extends Controller
{
    /**
     * Show all data of reseller
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resellers = Reseller::with([
            'user:id,fullname',
        ])->withCount('clients')->latest()
            ->paginate(10);

        return view('pages.admin.reseller.index', [
            'title' => 'Reseller',
            'resellers' => $resellers,
        ]);
    }

    /**
     * Show detail data of reseller
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, string $id)
    {
        $reseller = Reseller::with([
            'user',
            'clients',
        ])->where('id', $id)->firstOrFail();

        return view('pages.admin.reseller.detail', [
            'title' => 'Reseller: ' . $reseller->name,
            'reseller' => $reseller,
        ]);
    }

    /**
     * Show create data form
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.admin.reseller.create');
    }

    /**
     * Store data process
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'nullable|email:rfc,dns',
            'phoneNumber' => 'nullable|numeric',
            'address' => 'required',
            'contractStartDate' => 'required|date',
            'contractEndDate' => 'required|date|after:contractStartDate',
            'logo' => 'nullable|file|image|max:1024',

            'owner_fullname' => 'required',
            'owner_username' => 'required|unique:users,username',
            'owner_email' => 'nullable|email:rfc,dns',
            'owner_password' => 'required|confirmed',
            'owner_birth' => 'nullable|date',
            'owner_gender' => 'nullable|in:female,male',
            'owner_address' => 'nullable',
            'owner_photo' => 'nullable|image|max:1024',
        ]);

        $photoPath = null;
        $logoPath = null;

        try {
            if ($request->hasFile('logo')) {
                $logo = Image::make($request->file('logo'));
                $logo->fit($logo->width());

                $logoPath = 'images/mitra/' . Str::slug($request->input('name')) . time() . '.webp';

                Storage::disk('public')->put(
                    $logoPath,
                    $logo->encode('webp')
                );
            }

            if ($request->hasFile('owner_photo')) {
                $photo = Image::make($request->file('owner_photo'));
                $photo->fit($photo->width());

                $photoPath = 'images/profile/' . $request->input('owner_username') . '.webp';

                Storage::disk('public')->put(
                    $photoPath,
                    $photo->encode('webp')
                );
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage(), $ex);
        }

        DB::transaction(function () use ($request, $photoPath, $logoPath) {
            $user = new User([
                'fullname' => $request->input('owner_fullname'),
                'username' => $request->input('owner_username'),
                'email' => $request->input('owner_email'),
                'password' => Hash::make($request->input('owner_password')),
                'birthday' => $request->input('owner_birth'),
                'gender' => $request->input('owner_gender'),
                'address' => $request->input('owner_address'),
                'photo' => $photoPath ? 'storage/' . $photoPath : null,
            ]);

            $user->save();

            $reseller = new Reseller([
                'name' => $request->input('name'),
                'photo' => $logoPath ? 'storage/' . $logoPath : null,
                'email' => $request->input('email'),
                'phone_number' => $request->input('phoneNumber'),
                'address' => $request->input('address'),
                'contract_start_at' => $request->input('contractStartDate'),
                'contract_end_at' => $request->input('contractEndDate'),
            ]);

            $user->reseller()->save($reseller);
        }, 5);

        return redirect()->route('admin.reseller')->with('status', 'Mitra ' . $request->input('name') . ' Telah Ditambahkan');
    }
}
