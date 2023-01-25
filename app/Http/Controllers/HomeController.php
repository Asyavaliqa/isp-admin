<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Dashboard by user role
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find(Auth::id());

        if ($user->hasRole('Admin')) {
            return $this->adminPages($request);
        } elseif ($user->hasRole('Reseller_Owner')) {
            return $this->resellerOwnerPages($request);
        } elseif ($user->hasRole('Reseller_Teknisi')) {
            return $this->resellerTeknisiPages($request);
        } elseif ($user->hasRole('Reseller_Admin')) {
            return $this->resellerAdminPages($request);
        } elseif ($user->hasRole('Client')) {
            return $this->clientPages($request);
        }
    }

    /**
     * Admin pages
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminPages(Request $request)
    {
        return view('pages.admin.home', [
            'title' => 'Admin Dashboard',
        ]);
    }

    /**
     * Reseller Owner pages
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resellerOwnerPages(Request $request)
    {
        return view('pages.reseller.home');
    }

    /**
     * Reseller Teknisi pages
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resellerTeknisiPages(Request $request)
    {
    }

    /**
     * Reseller Admin pages
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resellerAdminPages(Request $request)
    {
    }

    /**
     * Client pages
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clientPages(Request $request)
    {
    }
}
