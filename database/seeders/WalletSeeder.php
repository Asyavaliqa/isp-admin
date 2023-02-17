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
        $bills = Bill::with('reseller')->whereNotNull('accepted_at')->whereNotNull('payed_at')->get();

        foreach ($bills as $bill) {
            $transaction = $bill->reseller->deposit($bill->grand_total, [
                'description' => 'Pembayaran invoice: ' . $bill->invoice_id,
            ]);
            $bill->transaction()->associate($transaction);
            $bill->save();
        }
    }
}
