<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
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
            Role::ADMIN,
            Role::RESELLER_OWNER,
            Role::RESELLER_TECHNICIAN,
            Role::RESELLER_ADMIN,
            Role::CLIENT,
        ];

        collect($roles)->map(function ($role) {
            Role::create([
                'name' => $role,
            ]);
        });
    }
}
