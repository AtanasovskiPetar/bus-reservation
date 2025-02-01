<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusTimetablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bus_timetables')->delete();
        
        \DB::table('bus_timetables')->insert(array (
            0 => 
            array (
                'id' => 14,
                'bus_id' => 20,
                'day' => 'Monday',
                'departure_time' => '10:00:00',
                'created_at' => '2025-02-01 14:21:43',
                'updated_at' => '2025-02-01 14:21:43',
            ),
            1 => 
            array (
                'id' => 15,
                'bus_id' => 20,
                'day' => 'Wednesday',
                'departure_time' => '09:00:00',
                'created_at' => '2025-02-01 14:21:43',
                'updated_at' => '2025-02-01 14:21:43',
            ),
            2 => 
            array (
                'id' => 16,
                'bus_id' => 20,
                'day' => 'Thursday',
                'departure_time' => '11:30:00',
                'created_at' => '2025-02-01 14:21:43',
                'updated_at' => '2025-02-01 14:21:43',
            ),
            3 => 
            array (
                'id' => 17,
                'bus_id' => 20,
                'day' => 'Wednesday',
                'departure_time' => '14:00:00',
                'created_at' => '2025-02-01 14:21:43',
                'updated_at' => '2025-02-01 14:21:43',
            ),
            4 => 
            array (
                'id' => 18,
                'bus_id' => 1,
                'day' => 'Tuesday',
                'departure_time' => '10:00:00',
                'created_at' => '2025-02-01 14:24:06',
                'updated_at' => '2025-02-01 14:24:06',
            ),
            5 => 
            array (
                'id' => 19,
                'bus_id' => 1,
                'day' => 'Tuesday',
                'departure_time' => '16:00:00',
                'created_at' => '2025-02-01 14:24:06',
                'updated_at' => '2025-02-01 14:24:06',
            ),
            6 => 
            array (
                'id' => 20,
                'bus_id' => 1,
                'day' => 'Saturday',
                'departure_time' => '18:00:00',
                'created_at' => '2025-02-01 14:24:06',
                'updated_at' => '2025-02-01 14:24:06',
            ),
            7 => 
            array (
                'id' => 21,
                'bus_id' => 2,
                'day' => 'Monday',
                'departure_time' => '08:30:00',
                'created_at' => '2025-02-01 14:25:45',
                'updated_at' => '2025-02-01 14:25:45',
            ),
            8 => 
            array (
                'id' => 22,
                'bus_id' => 2,
                'day' => 'Monday',
                'departure_time' => '11:00:00',
                'created_at' => '2025-02-01 14:25:45',
                'updated_at' => '2025-02-01 14:25:45',
            ),
            9 => 
            array (
                'id' => 23,
                'bus_id' => 2,
                'day' => 'Sunday',
                'departure_time' => '10:00:00',
                'created_at' => '2025-02-01 14:25:45',
                'updated_at' => '2025-02-01 14:25:45',
            ),
            10 => 
            array (
                'id' => 24,
                'bus_id' => 2,
                'day' => 'Thursday',
                'departure_time' => '12:45:00',
                'created_at' => '2025-02-01 14:25:45',
                'updated_at' => '2025-02-01 14:25:45',
            ),
            11 => 
            array (
                'id' => 25,
                'bus_id' => 3,
                'day' => 'Monday',
                'departure_time' => '10:30:00',
                'created_at' => '2025-02-01 14:27:03',
                'updated_at' => '2025-02-01 14:27:03',
            ),
            12 => 
            array (
                'id' => 26,
                'bus_id' => 3,
                'day' => 'Tuesday',
                'departure_time' => '10:30:00',
                'created_at' => '2025-02-01 14:27:03',
                'updated_at' => '2025-02-01 14:27:03',
            ),
            13 => 
            array (
                'id' => 27,
                'bus_id' => 3,
                'day' => 'Wednesday',
                'departure_time' => '10:30:00',
                'created_at' => '2025-02-01 14:27:03',
                'updated_at' => '2025-02-01 14:27:03',
            ),
            14 => 
            array (
                'id' => 28,
                'bus_id' => 3,
                'day' => 'Thursday',
                'departure_time' => '10:30:00',
                'created_at' => '2025-02-01 14:27:03',
                'updated_at' => '2025-02-01 14:27:03',
            ),
            15 => 
            array (
                'id' => 29,
                'bus_id' => 3,
                'day' => 'Friday',
                'departure_time' => '10:30:00',
                'created_at' => '2025-02-01 14:27:03',
                'updated_at' => '2025-02-01 14:27:03',
            ),
            16 => 
            array (
                'id' => 30,
                'bus_id' => 4,
                'day' => 'Monday',
                'departure_time' => '08:00:00',
                'created_at' => '2025-02-01 14:29:09',
                'updated_at' => '2025-02-01 14:29:09',
            ),
            17 => 
            array (
                'id' => 31,
                'bus_id' => 4,
                'day' => 'Wednesday',
                'departure_time' => '09:00:00',
                'created_at' => '2025-02-01 14:29:09',
                'updated_at' => '2025-02-01 14:29:09',
            ),
            18 => 
            array (
                'id' => 32,
                'bus_id' => 4,
                'day' => 'Thursday',
                'departure_time' => '08:00:00',
                'created_at' => '2025-02-01 14:29:09',
                'updated_at' => '2025-02-01 14:29:09',
            ),
            19 => 
            array (
                'id' => 33,
                'bus_id' => 4,
                'day' => 'Sunday',
                'departure_time' => '10:00:00',
                'created_at' => '2025-02-01 14:29:09',
                'updated_at' => '2025-02-01 14:29:09',
            ),
            20 => 
            array (
                'id' => 34,
                'bus_id' => 5,
                'day' => 'Tuesday',
                'departure_time' => '10:00:00',
                'created_at' => '2025-02-01 14:30:54',
                'updated_at' => '2025-02-01 14:30:54',
            ),
            21 => 
            array (
                'id' => 35,
                'bus_id' => 5,
                'day' => 'Thursday',
                'departure_time' => '17:00:00',
                'created_at' => '2025-02-01 14:30:54',
                'updated_at' => '2025-02-01 14:30:54',
            ),
            22 => 
            array (
                'id' => 36,
                'bus_id' => 5,
                'day' => 'Saturday',
                'departure_time' => '16:00:00',
                'created_at' => '2025-02-01 14:30:54',
                'updated_at' => '2025-02-01 14:30:54',
            ),
            23 => 
            array (
                'id' => 37,
                'bus_id' => 8,
                'day' => 'Saturday',
                'departure_time' => '19:00:00',
                'created_at' => '2025-02-01 14:34:01',
                'updated_at' => '2025-02-01 14:34:01',
            ),
            24 => 
            array (
                'id' => 38,
                'bus_id' => 8,
                'day' => 'Sunday',
                'departure_time' => '17:00:00',
                'created_at' => '2025-02-01 14:34:01',
                'updated_at' => '2025-02-01 14:34:01',
            ),
            25 => 
            array (
                'id' => 39,
                'bus_id' => 8,
                'day' => 'Wednesday',
                'departure_time' => '09:00:00',
                'created_at' => '2025-02-01 14:34:01',
                'updated_at' => '2025-02-01 14:34:01',
            ),
            26 => 
            array (
                'id' => 40,
                'bus_id' => 7,
                'day' => 'Tuesday',
                'departure_time' => '10:00:00',
                'created_at' => '2025-02-01 14:35:48',
                'updated_at' => '2025-02-01 14:35:48',
            ),
            27 => 
            array (
                'id' => 41,
                'bus_id' => 7,
                'day' => 'Tuesday',
                'departure_time' => '15:00:00',
                'created_at' => '2025-02-01 14:35:48',
                'updated_at' => '2025-02-01 14:35:48',
            ),
            28 => 
            array (
                'id' => 42,
                'bus_id' => 7,
                'day' => 'Thursday',
                'departure_time' => '09:00:00',
                'created_at' => '2025-02-01 14:35:48',
                'updated_at' => '2025-02-01 14:35:48',
            ),
            29 => 
            array (
                'id' => 43,
                'bus_id' => 7,
                'day' => 'Friday',
                'departure_time' => '07:30:00',
                'created_at' => '2025-02-01 14:35:48',
                'updated_at' => '2025-02-01 14:35:48',
            ),
            30 => 
            array (
                'id' => 44,
                'bus_id' => 6,
                'day' => 'Tuesday',
                'departure_time' => '19:00:00',
                'created_at' => '2025-02-01 14:36:32',
                'updated_at' => '2025-02-01 14:36:32',
            ),
            31 => 
            array (
                'id' => 45,
                'bus_id' => 6,
                'day' => 'Wednesday',
                'departure_time' => '14:00:00',
                'created_at' => '2025-02-01 14:36:32',
                'updated_at' => '2025-02-01 14:36:32',
            ),
            32 => 
            array (
                'id' => 46,
                'bus_id' => 6,
                'day' => 'Saturday',
                'departure_time' => '10:00:00',
                'created_at' => '2025-02-01 14:36:32',
                'updated_at' => '2025-02-01 14:36:32',
            ),
        ));
        
        
    }
}