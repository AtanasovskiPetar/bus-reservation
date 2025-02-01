<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-01-19 10:34:22',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'guard_name' => 'web',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-01-19 10:34:22',
            ),
        ));
        
        
    }
}