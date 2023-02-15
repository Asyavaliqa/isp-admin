<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Client;
use App\Models\Plan;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
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
            $now = Carbon::parse($client->created_at)->setDay(1);
            $totalMonth = $now->diffInMonths(now()) - 1;

            for ($i = 1; $i <= $totalMonth; $i++) {
                $current = CarbonImmutable::parse($now->addMonth());

                $invoiceId = sprintf(
                    'INV/%s/%03d/%s',
                    $now->format('Ymd'),
                    $client->id,
                    random_number(4)
                );

                if ($client->plan->tax_type === Plan::TAX_INCLUDED) {
                    $price = $client->plan->price;
                } else {
                    $price = $client->plan->price + ($client->plan->price * Plan::TAX);
                }

                array_push($bills, [
                    'invoice_id' => $invoiceId,
                    'type' => $i <= 0 ? Bill::TYPE_NEW_PURCHASE : Bill::TYPE_EXTENSION,
                    'bill_photo' => 'assets/img/bills/bukti-bayar-200x300.png',
                    'balance' => $price,
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
                    'accepted_at' => $current->addHour(),
                    'payed_at' => $current->addMinutes(15),
                    'payment_month' => $current->setDay(1)->subMonth(),
                    'created_at' => $current,
                    'updated_at' => $current,
                ]);
            }
        }

        Bill::insert($bills);
    }
}
