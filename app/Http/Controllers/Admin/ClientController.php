<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::with([
            'user',
            'reseller',
            'bandwidth',
        ])->paginate();

        return view('pages.admin.client.index', [
            'title' => 'Pelanggan',
            'clients' => $clients,
        ]);
    }
}
