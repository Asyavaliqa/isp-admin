<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.client.invoice.index', [
            'title' => 'Tagihan',
        ]);
    }
}
