<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Reseller;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [];
        $faker = fake('id_ID');
        foreach (Reseller::get() as $reseller) {
            array_push(
                $plans,
                [
                    'name' => 'Paket Small (10Mbps)',
                    'bandwidth' => 10,
                    'price' => $faker->numberBetween(10, 15) * 10000,
                    'reseller_id' => $reseller->id,
                    'created_at' => $reseller->created_at,
                    'updated_at' => $reseller->updated_at,
                    'tax_type' => Plan::TAX_INCLUDED,
                    'type' => Plan::PLAN_FIXED,
                    'subscription' => Plan::SUBSCRIPTION_POSTPAID,
                ], [
                    'name' => 'Paket Medium (20Mbps)',
                    'bandwidth' => 20,
                    'price' => $faker->numberBetween(15, 20) * 10000,
                    'reseller_id' => $reseller->id,
                    'created_at' => $reseller->created_at,
                    'updated_at' => $reseller->updated_at,
                    'tax_type' => Plan::TAX_INCLUDED,
                    'type' => Plan::PLAN_FIXED,
                    'subscription' => Plan::SUBSCRIPTION_POSTPAID,
                ], [
                    'name' => 'Paket Large (30Mbps)',
                    'bandwidth' => 30,
                    'price' => $faker->numberBetween(20, 25) * 10000,
                    'reseller_id' => $reseller->id,
                    'created_at' => $reseller->created_at,
                    'updated_at' => $reseller->updated_at,
                    'tax_type' => Plan::TAX_INCLUDED,
                    'type' => Plan::PLAN_FIXED,
                    'subscription' => Plan::SUBSCRIPTION_POSTPAID,
                ], [
                    'name' => 'Paket Xtra Large (40Mbps)',
                    'bandwidth' => 40,
                    'price' => $faker->numberBetween(25, 30) * 10000,
                    'reseller_id' => $reseller->id,
                    'created_at' => $reseller->created_at,
                    'updated_at' => $reseller->updated_at,
                    'tax_type' => Plan::TAX_INCLUDED,
                    'type' => Plan::PLAN_FIXED,
                    'subscription' => Plan::SUBSCRIPTION_POSTPAID,
                ], [
                    'name' => 'Paket Sekolah',
                    'bandwidth' => 100,
                    'price' => $faker->numberBetween(40, 50) * 10000,
                    'reseller_id' => $reseller->id,
                    'created_at' => $reseller->created_at,
                    'updated_at' => $reseller->updated_at,
                    'tax_type' => Plan::TAX_EXCLUDED,
                    'type' => Plan::PLAN_DYNAMIC,
                    'subscription' => Plan::SUBSCRIPTION_POSTPAID,
                ], [
                    'name' => 'Paket Corporate',
                    'bandwidth' => 200,
                    'price' => $faker->numberBetween(50, 100) * 10000,
                    'reseller_id' => $reseller->id,
                    'created_at' => $reseller->created_at,
                    'updated_at' => $reseller->updated_at,
                    'tax_type' => Plan::TAX_EXCLUDED,
                    'type' => Plan::PLAN_DYNAMIC,
                    'subscription' => Plan::SUBSCRIPTION_POSTPAID,
                ]
            );
        }

        Plan::insert($plans);
    }
}
