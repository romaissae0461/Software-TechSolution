<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create roles
        $admin=Role::create(['name'=>'admin']);
        $user=Role::create(['name'=>'user']);

        //Create permissions
        $permissions=['create', 'edit', 'delete', 'read'];
        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }

        //Affect permission
        $admin->givePermissionTo(Permission::all());
        $user->givePermissionTo('read');

        $firstAdmin= User::first();
        if ($firstAdmin) {
            $firstAdmin->assignRole('admin');
        }
    }
}
