<?php

namespace Database\Seeders;

use App\Models\Transaction;
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
        $transactions = Transaction::with('reseller')->whereNotNull('accepted_at')->get();

        foreach ($transactions as $transaction) {
            $transaction->reseller->deposit($transaction->balance);
        }
    }
}
