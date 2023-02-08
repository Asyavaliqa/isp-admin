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
                    'price' => $faker->numberBetween(100 * 1000, 150 * 1000),
                    'reseller_id' => $reseller->id,
                    'created_at' => $reseller->created_at,
                    'updated_at' => $reseller->updated_at,
                ],
                [
                    'name' => 'Paket Medium (20Mbps)',
                    'bandwidth' => 20,
                    'price' => $faker->numberBetween(150 * 1000, 200 * 1000),
                    'reseller_id' => $reseller->id,
                    'created_at' => $reseller->created_at,
                    'updated_at' => $reseller->updated_at,
                ],
                [
                    'name' => 'Paket Large (30Mbps)',
                    'bandwidth' => 30,
                    'price' => $faker->numberBetween(200 * 1000, 250 * 1000),
                    'reseller_id' => $reseller->id,
                    'created_at' => $reseller->created_at,
                    'updated_at' => $reseller->updated_at,
                ],
                [
                    'name' => 'Paket Xtra Large (40Mbps)',
                    'bandwidth' => 40,
                    'price' => $faker->numberBetween(250 * 1000, 300 * 1000),
                    'reseller_id' => $reseller->id,
                    'created_at' => $reseller->created_at,
                    'updated_at' => $reseller->updated_at,
                ],
            );
        }

        Plan::insert($plans);
    }
}
