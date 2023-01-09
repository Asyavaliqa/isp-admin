<?php

namespace Database\Seeders;

use App\Models\Bandwidth;
use App\Models\Client;
use App\Models\Reseller;
use App\Models\User;
use Illuminate\Database\Seeder;

class MainUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Add Administrator
         */
        User::factory(1, [
            'username' => 'admin',
        ])->create()->each(function ($user) {
            $user->assignRole('Admin');
        });

        /**
         * Add Resellers
         */
        User::factory(1, [
            'username' => 'reseller_owner',
        ])->create()->each(function ($resellerOwner) {
            $resellerOwner->assignRole('Reseller_Owner');

            Reseller::factory(1, [
                'user_id' => $resellerOwner->id,
            ])->create()->each(function ($reseller) {
                $faker = fake('id_ID');
                $bandwidths = [
                    [
                        'name' => 'Paket Small (10Mbps)',
                        'bandwidth' => 10,
                        'price' => $faker->numberBetween(100 * 1000, 150 * 1000),
                        'reseller_id' => $reseller->id,
                    ],
                    [
                        'name' => 'Paket Medium (20Mbps)',
                        'bandwidth' => 20,
                        'price' => $faker->numberBetween(150 * 1000, 200 * 1000),
                        'reseller_id' => $reseller->id,
                    ],
                    [
                        'name' => 'Paket Large (30Mbps)',
                        'bandwidth' => 30,
                        'price' => $faker->numberBetween(200 * 1000, 250 * 1000),
                        'reseller_id' => $reseller->id,
                    ],
                    [
                        'name' => 'Paket Xtra Large (40Mbps)',
                        'bandwidth' => 40,
                        'price' => $faker->numberBetween(250 * 1000, 300 * 1000),
                        'reseller_id' => $reseller->id,
                    ],
                ];

                collect($bandwidths)->map(function ($bandwidth) {
                    Bandwidth::create($bandwidth);
                });

                /**
                 * Add Reseller Admin
                 */
                User::factory(1, [
                    'username' => 'reseller_admin',
                ])->create()->each(function ($resellerAdmin) use ($reseller) {
                    $resellerAdmin->assignRole('Reseller_Admin');
                    $reseller->users()->attach($resellerAdmin->id);
                });

                /**
                 * Add Reseller Admin
                 */
                User::factory(3)->create()->each(function ($resellerAdmin) use ($reseller) {
                    $resellerAdmin->assignRole('Reseller_Admin');
                    $reseller->users()->attach($resellerAdmin->id);
                });

                /**
                 * Add Reseller Teknisi
                 */
                User::factory(1, [
                    'username' => 'reseller_teknisi',
                ])->create()->each(function ($resellerTeknisi) use ($reseller) {
                    $resellerTeknisi->assignRole('Reseller_Teknisi');
                    $reseller->users()->attach($resellerTeknisi->id);
                });

                /**
                 * Add Reseller Teknisi
                 */
                User::factory(5)->create()->each(function ($resellerTeknisi) use ($reseller) {
                    $resellerTeknisi->assignRole('Reseller_Teknisi');
                    $reseller->users()->attach($resellerTeknisi->id);
                });

                /**
                 * Add Client
                 */
                User::factory(1, [
                    'username' => 'client',
                ])->create()->each(function ($user) use ($reseller, $faker) {
                    $user->assignRole('Client');
                    $month = $faker->numberBetween(1, 12);
                    $day = $faker->numberBetween(1, 30);

                    Client::create([
                        'user_id' => $user->id,
                        'bandwidth_id' => Bandwidth::inRandomOrder()->first()->id,
                        'reseller_id' => $reseller->id,
                        'payment_due_date' => "{$month}-{$day}",
                    ]);
                });

                /**
                 * Add Random Client
                 */
                User::factory(50)->create()->each(function ($user) use ($reseller, $faker) {
                    $user->assignRole('Client');
                    $month = $faker->numberBetween(1, 12);
                    $day = $faker->numberBetween(1, 30);

                    Client::create([
                        'user_id' => $user->id,
                        'bandwidth_id' => Bandwidth::inRandomOrder()->first()->id,
                        'reseller_id' => $reseller->id,
                        'payment_due_date' => "{$month}-{$day}",
                    ]);
                });
            });
        });
    }
}
