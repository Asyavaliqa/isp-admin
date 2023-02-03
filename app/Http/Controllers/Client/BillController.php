<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.client.bill.index', [
            'title' => 'Transaksi',
        ]);
    }
}
