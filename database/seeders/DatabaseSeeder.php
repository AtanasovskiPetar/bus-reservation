<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            BusSeeder::class,
        ]);
        $this->call(BusTimetablesTableSeeder::class);
        $this->call(BusesTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
