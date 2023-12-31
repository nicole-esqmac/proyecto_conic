<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin: todo el acceso
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'admin_';
        });

        // Role::findOrFail(2)->permissions()->sync($user_permissions);


        Role::findOrFail(2)->permissions()->attach([2]);//Gestor: solo acceso proyeto
        Role::findOrFail(3)->permissions()->attach([3]);//Contador: solo acceso contador
        Role::findOrFail(4)->permissions()->attach([4]);//Usuario: solo acceso usuario



    }
}
