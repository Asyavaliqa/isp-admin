<?php

namespace App\Providers;

use App\Models\Bill;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check() && Auth::user()->hasAnyRole([
                Role::RESELLER_ADMIN,
                Role::RESELLER_OWNER,
            ])) {
                $bill = Bill::select('id')->whereHas('reseller', function ($q) {
                    $q->where('user_id', Auth::id());
                });
                $totalOutstandingBill = $bill->whereNull('payed_at')->whereNull('accepted_at')->count();
                $totalPaidBill = $bill->whereNotNull('payed_at')->whereNull('accepted_at')->count();
            }

            $view->with('totalOutstandingBill', $totalOutstandingBill ?? 0);
            $view->with('totalPaidBill', $totalPaidBill ?? 0);
        });
    }
}
