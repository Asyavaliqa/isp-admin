<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.client.payment.index', [
            'title' => 'Pembayaran',
        ]);
    }
}
