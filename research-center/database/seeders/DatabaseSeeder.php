<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        // Buat role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $researcherRole = Role::firstOrCreate(['name' => 'researcher']);

        // Buat permission
        $createResearcherPermission = Permission::firstOrCreate(['name' => 'create researcher']);

        // Berikan izin ke admin
        $adminRole->givePermissionTo($createResearcherPermission);

        // Berikan role admin ke user tertentu (misalnya, yang sudah ada)
        $adminUser = User::where('email', 'johndoe@example.com')->first();
        if ($adminUser) {
            $adminUser->assignRole('admin');
            $adminUser->givePermissionTo('create researcher');
        }
    }
}

