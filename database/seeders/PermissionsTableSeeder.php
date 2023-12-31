<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $permissions = [
            [
                'id'    => 1,
                'title' => 'admin_access',
            ],
            [
                'id'    => 2,
                'title' => 'proyectos_access',
            ],
            [
                'id'    => 3,
                'title' => 'contador_access',
            ],
            [
                'id'    => 4,
                'title' => 'user_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
