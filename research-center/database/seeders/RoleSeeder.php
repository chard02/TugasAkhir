<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Buat permission
        $createResearcher = Permission::firstOrCreate(['name' => 'create researcher']);

        // Buat role dan berikan permission
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $researcherRole = Role::firstOrCreate(['name' => 'researcher']);
        $buyerRole = Role::firstOrCreate(['name' => 'buyer']);

        // Berikan permission hanya ke admin
        $adminRole->givePermissionTo($createResearcher);
    }
}
