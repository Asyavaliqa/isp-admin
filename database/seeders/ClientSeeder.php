<?php

namespace Database\Seeders;

use App\Models\Bandwidth;
use App\Models\Client;
use App\Models\Reseller;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake('id_ID');
        $reseller = Reseller::first();
        $bandwidths = Bandwidth::select('id')->where('reseller_id', $reseller->id)->get();
        $bandwidthIds = Arr::pluck($bandwidths, 'id');

        $client = User::factory(1, [
            'username' => 'client',
            'created_at' => $createdAt = $faker->dateTimeBetween($reseller->created_at, '-4 months'),
            'updated_at' => $createdAt,
        ])->create();
        $dummyClients = User::factory(mt_rand(12, 18), [
            'created_at' => $createdAt = $faker->dateTimeBetween($reseller->created_at, '-4 months'),
            'updated_at' => $createdAt,
        ])->create();
        $clients = [];

        foreach ($client->merge($dummyClients) as $user) {
            $date = $faker->numberBetween(1, 30);

            $clients[] = [
                'user_id' => $user->id,
                'bandwidth_id' => $faker->randomElement($bandwidthIds),
                'reseller_id' => $reseller->id,
                'payment_due_date' => "{$date}",
                'is_ppn' => $faker->randomElement([1, 0]),
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
        }

        Client::insert($clients);
    }
}
