<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'dashboard',
                'guard_name' => 'web',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-01-19 10:34:22',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'create-bus',
                'guard_name' => 'web',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-01-19 10:34:22',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'edit-bus',
                'guard_name' => 'web',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-01-19 10:34:22',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'delete-bus',
                'guard_name' => 'web',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-01-19 10:34:22',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'manage-users',
                'guard_name' => 'web',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-01-19 10:34:22',
            ),
        ));
        
        
    }
}