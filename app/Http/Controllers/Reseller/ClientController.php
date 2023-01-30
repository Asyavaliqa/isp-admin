<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'title' => 'Pelanggan',
            'clients' => $clients,
        ]);
    }
}
