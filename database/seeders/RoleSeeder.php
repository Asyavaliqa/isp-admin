<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            'Admin',
            'Reseller_Owner',
            'Reseller_Teknisi',
            'Reseller_Admin',
            'Client',
        ];

        collect($roles)->map(function ($role) {
            Role::create([
                'name' => $role,
            ]);
        });
    }
}
