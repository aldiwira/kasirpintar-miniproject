<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name'=> 'create items']);
        Permission::create(['name'=> 'edit items']);
        Permission::create(['name'=> 'delete items']);

        $adminrole = Role::create(['name' => 'admin']);
        $adminrole->givePermissionTo('create items');
        $adminrole->givePermissionTo('edit items');
        $adminrole->givePermissionTo('delete items');

        $staffrole = Role::create(['name' => 'staff']);
        $staffrole->givePermissionTo('create items');
        $staffrole->givePermissionTo('edit items');

        $admin = User::factory()->create([
            'name' => "Admin",
            'email' => "admin@gmail.com"
        ]);
        $admin->assignRole($adminrole);

        $staff = User::factory()->create([
            'name' => "Staff",
            'email' => "staff@gmail.com"
        ]);
        $staff->assignRole($staffrole);

    }
}
