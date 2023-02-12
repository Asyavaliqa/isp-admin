<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bills = Bill::with('reseller')->whereNotNull('accepted_at')->get();

        foreach ($bills as $bill) {
            $bill->reseller->deposit($bill->balance);
        }
    }
}
