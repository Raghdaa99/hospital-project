<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::create(['name' => 'Create-Role', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Roles', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Role', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Role', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Permission', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Permissions', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Permission', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Permission', 'guard_name' => 'admin']);


        // Permission::create(['name' => 'Create-User', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Users', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-User', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-User', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Admins', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'admin']);

        //Permission::create(['name' => 'Read-Cities', 'guard_name' => 'web']);
        //Permission::create(['name' => 'Read-Users', 'guard_name' => 'web']);

        // Permission::create(['name' => 'Create-Patient', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Patients', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Patient', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Patient', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Read-Patients', 'guard_name' => 'web']);
        Permission::create(['name' => 'Create-Specialty', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Specialties', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Specialty', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Specialty', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-Appointment', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Appointments', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Appointment', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Appointment', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Read-Appointments', 'guard_name' => 'web']);

    }
}
