<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.reseller.client.index', [
            'title' => 'Pelanggan',
        ]);
    }
}
