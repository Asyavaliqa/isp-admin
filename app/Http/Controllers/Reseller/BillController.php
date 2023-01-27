<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.reseller.bill.index', [
            'title' => 'Pelanggan',
        ]);
    }
}
