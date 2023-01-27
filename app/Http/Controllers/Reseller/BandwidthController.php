<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BandwidthController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.reseller.bandwidth.index', [
            'title' => 'Pelanggan',
        ]);
    }
}
