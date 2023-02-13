<?php

namespace App\Console\Commands;

use App\Models\Bill;
use App\Models\Client;
use App\Models\Plan;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Log;
use Throwable;

class GenerateBill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bill:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate bill for previous month for all client';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle($month = null)
    {
        $now = now();
        if (empty($month)) {
            $month = $now->format('m');
        }

        $clients = Client::with([
            'user:id,fullname',
            'plan:id,name,price',
            'reseller:id,name',
            'lastBill',
        ])->orderBy('id', 'desc')->get();

        $bills = [];

        foreach ($clients as $client) {
            $createdAt = Carbon::parse($client->lastBill->created_at ?? now()->setDay(1)->subMonths(1));
            $diffMonth = Carbon::parse($createdAt->format('Y-m'))->diffInMonths();

            // Skip creating bill when user had bill
            if (empty($diffMonth)) {
                continue;
            }

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
                'type' => Bill::TYPE_EXTENSION,
                'balance' => $price,
                'reseller_id' => $client->reseller->id,
                'reseller_name' => $client->reseller->name,
                'client_id' => $client->id,
                'client_name' => $client->user->fullname,
                'plan_id' => $client->plan_id,
                'plan_name' => $client->plan->name,
                'description' => sprintf(
                    'Perpanjangan paket %s',
                    $client->plan->name
                ),
                'created_at' => $now,
                'payment_month' => $now->setDay(1)->subMonth(),
                'updated_at' => $now,
            ]);
        }

        try {
            DB::transaction(function () use ($bills) {
                Bill::insert($bills);
            }, 5);
        } catch (Throwable $e) {
            Log::error($e->getMessage(), $e->getTrace());

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
