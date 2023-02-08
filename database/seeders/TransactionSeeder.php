<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [];
        $clients = Client::with([
            'user:id,fullname',
            'plan:id,name,price',
            'reseller:id,name',
        ])->get();

        foreach ($clients as $client) {
            for ($i = 1; $i < $client->created_at->diffInMonths(now()); $i++) {
                $now = $client->created_at->addMonths($i + 1);
                $digits = 4;
                $randNumber = sprintf(
                    '%04d',
                    random_int(1, pow(10, $digits) - 1)
                );
                $invoiceId = sprintf(
                    'INV/%s/%03d/%s',
                    $now->format('Ymd'),
                    $client->id,
                    $randNumber
                );

                array_push($transactions, [
                    'invoice_id' => $invoiceId,
                    'type' => Transaction::TYPE_NEW_PURCHASE,
                    'bill_photo' => 'assets/img/bills/bukti-bayar-200x300.png',
                    'balance' => $client->plan->price,
                    'reseller_id' => $client->reseller->id,
                    'reseller_name' => $client->reseller->name,
                    'client_id' => $client->id,
                    'client_name' => $client->user->fullname,
                    'plan_id' => $client->plan_id,
                    'plan_name' => $client->plan->name,
                    'accepted_at' => $now->addHour(),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }

        Transaction::insert($transactions);
    }
}
