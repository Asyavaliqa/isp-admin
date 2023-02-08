<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Plan;
use App\Models\Reseller;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

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
        $plans = Plan::select('id')->where('reseller_id', $reseller->id)->get();
        $planIds = Arr::pluck($plans, 'id');

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
                'plan_id' => $faker->randomElement($planIds),
                'reseller_id' => $reseller->id,
                'payment_due_date' => "{$date}",
                'is_ppn' => $faker->randomElement([1, 0]),
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
        }

        Client::insert($clients);

        Role::findByName('Client')->users()->sync(Arr::pluck($clients, 'user_id'));
    }
}
