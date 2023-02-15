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
        $createdAt = now()->setMonth(1)->setDay(1)->subYears(1)->subMonths(2);

        $client = User::factory(1, [
            'username' => 'client',
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ])->create();
        $dummyClients = User::factory(mt_rand(12, 15), [
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ])->create();
        $clients = [];

        foreach ($client->merge($dummyClients) as $i => $user) {
            $date = $faker->numberBetween(1, 30);
            $createdAt = $user->created_at->addMonth($i);

            $clients[] = [
                'user_id' => $user->id,
                'plan_id' => $faker->randomElement($planIds),
                'reseller_id' => $reseller->id,
                'payment_due_date' => "{$date}",
                'is_ppn' => $faker->randomElement([1, 0]),
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];
        }

        Client::insert($clients);

        Role::findByName('Client')->users()->sync(Arr::pluck($clients, 'user_id'));
    }
}
