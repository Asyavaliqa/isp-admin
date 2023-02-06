<?php

namespace Database\Seeders;

use App\Models\Reseller;
use App\Models\User;
use Illuminate\Database\Seeder;

class ResellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake('id_ID');

        foreach (User::factory(1, ['username' => 'reseller_owner'])->create() as $owner) {
            $owner->assignRole('Reseller_Owner');

            $reseller = Reseller::create(Reseller::factory(1, [
                'user_id' => $owner->id,
            ])->makeOne()->toArray());

            $resellerAdmin = User::factory(1, [
                'username' => 'reseller_admin',
                'created_at' => $reseller->created_at,
                'updated_at' => $reseller->updated_at,
            ])->create();
            $dummyResellerAdmin = User::factory(mt_rand(1, 2), [
                'created_at' => $reseller->created_at,
                'updated_at' => $reseller->updated_at,
            ])->create();
            foreach ($resellerAdmin->merge($dummyResellerAdmin) as $admin) {
                $admin->assignRole('Reseller_Admin');
                $reseller->employees()->attach($admin->id);
            }

            $resellerTeknisi = User::factory(1, [
                'username' => 'reseller_teknisi',
                'created_at' => $reseller->created_at,
                'updated_at' => $reseller->updated_at,
            ])->create();
            $dummyResellerTeknisi = User::factory(mt_rand(8, 12), [
                'created_at' => $reseller->created_at,
                'updated_at' => $reseller->updated_at,
            ])->create();
            foreach ($resellerTeknisi->merge($dummyResellerTeknisi) as $teknisi) {
                $teknisi->assignRole('Reseller_Teknisi');
                $reseller->employees()->attach($teknisi->id);
            }
        }
    }
}
