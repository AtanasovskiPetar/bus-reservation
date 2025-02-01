<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin user',
                'email' => 'admin@admin.com',
                'email_verified_at' => '2025-01-19 10:34:22',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'x1G7d3ZxSj3hQ2w2IEEZGrJY8AUBgi4qQIoQ1hm5zvW662zrgJ1A96A4oXyF',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-01-19 10:34:22',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Petar',
                'email' => 'petar@petar.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$hAgRTsQmexdxRiPiIDmp2uR5YF5nWv4NUzdqnXfcPCK5ddv6f53XC',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'created_at' => '2025-02-01 14:57:40',
                'updated_at' => '2025-02-01 14:57:40',
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'John Doe',
                'email' => 'john@john.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$7c5l8B20IYC7.643WJQQC.vUJDixKCsiQwMFU14ho6iLr3N6d0F32',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'created_at' => '2025-02-01 14:58:25',
                'updated_at' => '2025-02-01 14:58:25',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Johny Doe',
                'email' => 'johny@johny.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$t/l.l3gzU7m5zldaHIEZKuxVzKn33Y43bnG8nPjVnHit/Dr0J9QTG',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'created_at' => '2025-02-01 14:59:05',
                'updated_at' => '2025-02-01 14:59:05',
            ),
        ));
        
        
    }
}