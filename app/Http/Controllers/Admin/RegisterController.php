<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.register.index', [
            'title' => 'Pendaftaran Akun',
        ]);
    }
}
