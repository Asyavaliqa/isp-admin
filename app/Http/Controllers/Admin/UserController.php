<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function detail(Request $request, int $id): View
    {
        $owner = User::where('id', $id)->firstOrFail();

        return view('pages.admin.user.detail', [
            'title' => 'User',
            'owner' => $owner,
        ]);
    }
}
