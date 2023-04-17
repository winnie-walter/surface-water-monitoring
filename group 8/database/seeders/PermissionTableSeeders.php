<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Add User',
            'Edit User',
            'View User',
            'Delete User',
            'Add Roles',
            'Edit Roles',
            'View Roles',
            'Delete Roles',
            'Visalization Temperature',
            'Visalization Water Level',
            'Visalization flowrate',
            'Generate Report temperature',
            'Generate Report water level',
            'Generate Report flowrate',
            'View temperature Data',
            'View Water level Data',
            'View flowrate Data',
            'block user',
            'unblock user',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}
