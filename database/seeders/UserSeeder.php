<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->mainAccount();

        $this->generateRandomAccount();
    }

    /**
     * Generate main account
     *
     * @return void
     */
    public function mainAccount()
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
         * Add Reseller Owner
         */
        User::factory(1, [
            'username' => 'reseller_owner',
        ])->create()->each(function ($resellerOwner) {
            $resellerOwner->assignRole('Reseller_Owner');

            /**
             * Add Reseller Admin
             */
            User::factory(1, [
                'username' => 'reseller_admin',
            ])->create()->each(function ($resellerAdmin) {
                $resellerAdmin->assignRole('Reseller_Admin');
            });

            /**
             * Add Reseller Teknisi
             */
            User::factory(1, [
                'username' => 'reseller_teknisi',
            ])->create()->each(function ($resellerTeknisi) {
                $resellerTeknisi->assignRole('Reseller_Teknisi');
            });

            /**
             * Add Client
             */
            User::factory(1, [
                'username' => 'client',
            ])->create()->each(function ($user) {
                $user->assignRole('Client');
            });
        });
    }

    /**
     * Generate random account
     *
     * @return void
     */
    public function generateRandomAccount()
    {
        /**
         * Add Reseller Owner
         */
        User::factory(mt_rand(15, 20))->create()->each(function ($resellerOwner) {
            $resellerOwner->assignRole('Reseller_Owner');

            /**
             * Add Reseller Admin
             */
            User::factory(1)->create()->each(function ($resellerAdmin) {
                $resellerAdmin->assignRole('Reseller_Admin');
            });

            /**
             * Add Reseller Teknisi
             */
            User::factory(1)->create()->each(function ($resellerTeknisi) {
                $resellerTeknisi->assignRole('Reseller_Teknisi');
            });

            /**
             * Add Client
             */
            User::factory(mt_rand(12, 25))->create()->each(function ($user) {
                $user->assignRole('Client');
            });
        });
    }
}
