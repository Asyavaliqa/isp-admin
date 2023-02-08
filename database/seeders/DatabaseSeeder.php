<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Load seeder sequentially
        $this->call([
            RoleSeeder::class,
            MainUserSeeder::class,
            ResellerSeeder::class,
            PlanSeeder::class,
            ClientSeeder::class,
            TransactionSeeder::class,
            WalletSeeder::class,
        ]);
    }
}
