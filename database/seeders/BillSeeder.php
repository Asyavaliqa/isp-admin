<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bills = [];
        $clients = Client::with([
            'user:id,fullname',
            'plan:id,name,price',
            'reseller:id,name',
        ])->get();

        foreach ($clients as $client) {
            for ($i = 0; $i < Carbon::parse($client->created_at->format('Y-m'))->diffInMonths(now()) - 1; $i++) {
                $now = Carbon::parse($client->created_at->format('Y-m'))->addMonths($i + 1)->addDays(mt_rand(1, 3));

                $invoiceId = sprintf(
                    'INV/%s/%03d/%s',
                    $now->format('Ymd'),
                    $client->id,
                    random_number(4)
                );

                array_push($bills, [
                    'invoice_id' => $invoiceId,
                    'type' => $i <= 0 ? Bill::TYPE_NEW_PURCHASE : Bill::TYPE_EXTENSION,
                    'bill_photo' => 'assets/img/bills/bukti-bayar-200x300.png',
                    'balance' => $client->plan->price,
                    'reseller_id' => $client->reseller->id,
                    'reseller_name' => $client->reseller->name,
                    'client_id' => $client->id,
                    'client_name' => $client->user->fullname,
                    'plan_id' => $client->plan_id,
                    'plan_name' => $client->plan->name,
                    'description' => $i <= 0 ? sprintf(
                        'Pembelian pertama paket %s',
                        $client->plan->name
                    ) : sprintf(
                        'Perpanjangan paket %s',
                        $client->plan->name
                    ),
                    'accepted_at' => $now->addHour(),
                    'payed_at' => $now->addMinutes(15),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }

        Bill::insert($bills);
    }
}
