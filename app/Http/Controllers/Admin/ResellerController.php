<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reseller;
use Illuminate\Http\Request;

class ResellerController extends Controller
{
    public function index(Request $request)
    {
        $resellers = Reseller::with([
            'user:id,fullname',
        ])->withCount('clients')
            ->paginate(10);

        return view('pages.admin.reseller.index', [
            'title' => 'Reseller',
            'resellers' => $resellers,
        ]);
    }

    public function detail(Request $request)
    {
        $reseller = Reseller::with([
            'user',
            'clients',
        ])->where('id', $request->input('id'))->first();

        return view('pages.admin.reseller.detail', [
            'title' => 'Reseller: ' . $reseller->fullname,
            'reseller' => $reseller,
        ]);
    }
}
