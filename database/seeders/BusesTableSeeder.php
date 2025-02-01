<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('buses')->delete();
        
        \DB::table('buses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Transkop Bitola',
                'bus_code' => 'Ax1defa',
                'img' => 'https://bus-reservation.s3.eu-north-1.amazonaws.com/highway_deluxe.jpg',
                'from' => 'Skopje',
                'to' => 'Bitola',
                'fare' => '630',
                'driver_name' => 'Bucky',
                'status' => 1,
                'seats' => 50,
                'maintenance' => 'no maintenance',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-02-01 14:23:18',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Rule Turs',
                'bus_code' => 'Z1fe3s3',
                'img' => 'https://bus-reservation.s3.eu-north-1.amazonaws.com/supreme_12_deluxe.jpg',
                'from' => 'Skopje',
                'to' => 'Gevgelija',
                'fare' => '620',
                'driver_name' => 'Smith',
                'status' => 1,
                'seats' => 50,
                'maintenance' => 'no maintenance',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-02-01 14:25:45',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Fudeks',
                'bus_code' => 'dd123d',
                'img' => 'https://bus-reservation.s3.eu-north-1.amazonaws.com/monkai_speedy.jpg',
                'from' => 'Skopje',
                'to' => 'Belgrade',
                'fare' => '1650',
                'driver_name' => 'Rnonny',
                'status' => 1,
                'seats' => 50,
                'maintenance' => 'no maintenance',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-02-01 14:27:03',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Transkop Bitola',
                'bus_code' => 'Z1fe3s3',
                'img' => 'https://bus-reservation.s3.eu-north-1.amazonaws.com/supreme_new_deluxe_12.jpg',
                'from' => 'Bitola',
                'to' => 'Prilep',
                'fare' => '305',
                'driver_name' => 'Michal',
                'status' => 1,
                'seats' => 50,
                'maintenance' => 'no maintenance',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-02-01 14:29:09',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Opal Com',
                'bus_code' => 'zxs23',
                'img' => 'https://bus-reservation.s3.eu-north-1.amazonaws.com/ment_12_bull.jpg',
                'from' => 'Bitola',
                'to' => 'Skopje',
                'fare' => '690',
                'driver_name' => 'Munic',
                'status' => 1,
                'seats' => 50,
                'maintenance' => 'no maintenance',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-02-01 14:30:54',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Shtuz Kumanovo',
                'bus_code' => 'cd123',
                'img' => 'https://bus-reservation.s3.eu-north-1.amazonaws.com/speedy_bus.jpg',
                'from' => 'Kumanovo',
                'to' => 'Skopje',
                'fare' => '170',
                'driver_name' => 'Petty',
                'status' => 1,
                'seats' => 50,
                'maintenance' => 'no maintenance',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-02-01 14:36:32',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Shtuz Kumanovo',
                'bus_code' => 'g1s3',
                'img' => 'https://bus-reservation.s3.eu-north-1.amazonaws.com/night_bus101.jpg',
                'from' => 'Skopje',
                'to' => 'Kumanovo',
                'fare' => '170',
                'driver_name' => 'Beya',
                'status' => 1,
                'seats' => 35,
                'maintenance' => 'no maintenance',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-02-01 14:35:48',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Galeb Ohrid',
                'bus_code' => 'Ay712',
                'img' => 'https://bus-reservation.s3.eu-north-1.amazonaws.com/every_day_bus_2.jpg',
                'from' => 'Ohrid',
                'to' => 'Skopje',
                'fare' => '890',
                'driver_name' => 'Sush',
                'status' => 1,
                'seats' => 10,
                'maintenance' => 'no maintenance',
                'created_at' => '2025-01-19 10:34:22',
                'updated_at' => '2025-02-01 14:34:01',
            ),
            8 => 
            array (
                'id' => 20,
                'name' => 'Galeb Ohrid',
                'bus_code' => 'At1defa',
                'img' => 'https://bus-reservation.s3.eu-north-1.amazonaws.com/bus_bus_abcabc.jpg.jpg',
                'from' => 'Skopje',
                'to' => 'Ohrid',
                'fare' => '890',
                'driver_name' => 'Petar Atanasovski',
                'status' => 1,
                'seats' => 50,
                'maintenance' => 'no maintenance',
                'created_at' => '2025-01-19 20:12:22',
                'updated_at' => '2025-02-01 14:21:43',
            ),
        ));
        
        
    }
}