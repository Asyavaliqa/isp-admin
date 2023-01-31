<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reseller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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
        $user = User::with('roles')->find(Auth::id());

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
        $data = shell_exec('uptime');
        $uptime = explode(' up ', $data);
        $uptime = explode(',', $uptime[1]);
        $uptime = $uptime[0] . '';

        $cpu = shell_exec('nproc') ?? 1;
        $cpuLoad = sys_getloadavg()[0] / $cpu ?? 0;

        $free = shell_exec('free');
        $free = (string) trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(' ', $free_arr[1]);
        $mem = array_filter($mem, function ($value) {
            return $value !== null && $value !== false && $value !== '';
        }); // removes nulls from array
        $mem = array_merge($mem); // puts arrays back to [0],[1],[2] after
        $memtotal = round($mem[1] / 1000000, 2);
        $memused = round($mem[2] / 1000000, 2);

        $diskfree = round(disk_free_space('.') / 1000000000);
        $disktotal = round(disk_total_space('.') / 1000000000);
        $diskused = round($disktotal - $diskfree);

        $userTotal = User::select('id')->count();
        $mitraTotal = Reseller::select('id')->count();
        $clientTotal = Client::select('id')->count();
        $mitraNonaktif = Reseller::select('inactive_at')->count();

        $mitras = Reseller::with([
            'user',
        ])->withCount('clients')->orderBy('clients_count', 'desc')->limit(10)->get();

        return view('pages.admin.home', [
            'title' => 'Admin Dashboard',
            'upTime' => $uptime,
            'cpuLoad' => $cpuLoad,
            'memTotal' => $memtotal,
            'memUsed' => $memused,
            'diskFree' => $diskfree,
            'diskTotal' => $disktotal,
            'diskUsed' => $diskused,
            'userTotal' => $userTotal,
            'mitraTotal' => $mitraTotal,
            'mitraNonaktif' => $mitraNonaktif,
            'clientTotal' => $clientTotal,
            'mitras' => $mitras,
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
