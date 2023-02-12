<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use App\Models\Reseller;
use App\Models\Role;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        if ($user->hasRole(Role::ADMIN)) {
            return $this->adminPages($request);
        } elseif ($user->hasRole(Role::RESELLER_OWNER)) {
            return $this->resellerOwnerPages($request);
        } elseif ($user->hasRole(Role::RESELLER_TECHNICIAN)) {
            return $this->resellerTeknisiPages($request);
        } elseif ($user->hasRole(Role::RESELLER_ADMIN)) {
            return $this->resellerAdminPages($request);
        } elseif ($user->hasRole(Role::CLIENT)) {
            return $this->clientPages($request);
        } else {
            abort(403);
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

        $mitras = Reseller::with(['user'])
            ->withCount('clients')
            ->orderBy('clients_count', 'desc')
            ->limit(10)
            ->get();

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
        $currentMonth = CarbonImmutable::parse(date('Y-m') . '-1');
        $from = $currentMonth->subMonth(6)->toDateTimeString();
        $to = $currentMonth->toDateTimeString();

        $bills = Bill::whereHas('reseller', function ($q) {
            $q->where('user_id', Auth::id());
        })
            ->select(DB::raw('sum(balance) as total'), DB::raw('CONCAT(MONTHNAME(created_at), " / ", YEAR(created_at)) as month_name'))
            ->whereBetween('created_at', [$from, $to])
            ->groupBy(DB::raw('MONTH(created_at)'), DB::raw('month_name'), DB::raw('YEAR(created_at)'))
            ->orderBy('id', 'ASC')
            ->pluck('total', 'month_name');

        $clients = Client::whereHas('reseller', function ($q) {
            $q->where('user_id', Auth::id());
        })
            ->select(DB::raw('COUNT(id) as count'), DB::raw('CONCAT(MONTHNAME(created_at), " / ", YEAR(created_at)) as month_name'))
            ->whereBetween('created_at', [$from, $to])
            ->groupBy(DB::raw('month_name'), DB::raw('YEAR(created_at)'))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'month_name');

        $totalClient = Client::whereHas('reseller', function ($q) {
            $q->where('user_id', Auth::id());
        })->count();

        $totalEmployee = Reseller::where('user_id', Auth::id())
            ->withCount('employees')->first()->employees_count;

        $unpayedBill = Bill::whereHas('reseller', function ($q) {
            $q->where('user_id', Auth::id());
        })
            ->whereNull('accepted_at')
            ->count();

        $totalEarning = Bill::whereHas('reseller', function ($q) {
            $q->where('user_id', Auth::id());
        })
        ->select(DB::raw('SUM(balance) as total'))
            ->whereMonth('created_at', now()->format('m') - 1)
            ->whereNotNull('accepted_at')
            ->first()?->total;

        return view('pages.reseller.home', [
            'client' => [
                'labels' => $clients->keys(),
                'data' => $clients->values(),
            ],
            'earning' => [
                'labels' => $bills->keys(),
                'data' => $bills->values(),
            ],
            'widget' => [
                'totalClient' => $totalClient ?? 0,
                'totalEmployee' => $totalEmployee ?? 0,
                'unpayedBill' => $unpayedBill ?? 0,
                'totalEarning' => $totalEarning ?? 0,
            ],
        ]);
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
        return view('pages.client.home');
    }
}
