<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reservations')->delete();
        
        \DB::table('reservations')->insert(array (
            0 => 
            array (
                'id' => 3,
                'bus_id' => 1,
                'user_id' => 5,
                'phone' => '+38976983368',
                'passengers' => 10,
                'reservation_date' => '2025-02-11 10:00:00',
                'created_at' => '2025-02-01 15:01:42',
                'updated_at' => '2025-02-01 15:01:42',
            ),
            1 => 
            array (
                'id' => 4,
                'bus_id' => 20,
                'user_id' => 5,
                'phone' => '+38976983368',
                'passengers' => 4,
                'reservation_date' => '2025-02-24 10:00:00',
                'created_at' => '2025-02-01 15:02:02',
                'updated_at' => '2025-02-01 15:02:02',
            ),
            2 => 
            array (
                'id' => 5,
                'bus_id' => 2,
                'user_id' => 5,
                'phone' => '+38976983368',
                'passengers' => 1,
                'reservation_date' => '2025-02-03 11:00:00',
                'created_at' => '2025-02-01 15:02:32',
                'updated_at' => '2025-02-01 15:02:32',
            ),
        ));
        
        
    }
}