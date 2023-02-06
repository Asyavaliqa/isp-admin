<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use App\Models\Bandwidth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BandwidthController extends Controller
{
    /**
     * Show table of available bandwidth
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bandwidths = Bandwidth::whereHas('reseller', function ($q) {
            $q->where('user_id', Auth::id());
        })->orderBy('id', 'desc');

        return view('pages.reseller.bandwidth.index', [
            'title' => 'Paket Internet',
            'bandwidths' => $bandwidths->paginate(20)->appends($request->all()),
        ]);
    }

    /**
     * Show detail data of plans
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, string $id)
    {
        $bandwidth = Bandwidth::whereHas('reseller', function ($q) {
            $q->where('user_id', Auth::id());
        })->findOrFail($id);

        return view('pages.reseller.bandwidth.detail', [
            'title' => 'Bandwidth: ' . $bandwidth->name,
            'bandwidth' => $bandwidth,
        ]);
    }
}
