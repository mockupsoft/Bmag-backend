<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('files')->delete();
        
        \DB::table('files')->insert(array (
            0 => 
            array (
                'id' => 1,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752139025.jpg',
                'created_at' => '2025-07-10 09:17:06',
                'updated_at' => '2025-07-10 09:17:06',
            ),
            1 => 
            array (
                'id' => 2,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317074.png',
                'created_at' => '2025-07-12 10:44:35',
                'updated_at' => '2025-07-12 10:44:35',
            ),
            2 => 
            array (
                'id' => 3,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317086.png',
                'created_at' => '2025-07-12 10:44:47',
                'updated_at' => '2025-07-12 10:44:47',
            ),
            3 => 
            array (
                'id' => 4,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317094.png',
                'created_at' => '2025-07-12 10:44:56',
                'updated_at' => '2025-07-12 10:44:56',
            ),
            4 => 
            array (
                'id' => 5,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317110.jpg',
                'created_at' => '2025-07-12 10:45:11',
                'updated_at' => '2025-07-12 10:45:11',
            ),
            5 => 
            array (
                'id' => 6,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317121.jpg',
                'created_at' => '2025-07-12 10:45:22',
                'updated_at' => '2025-07-12 10:45:22',
            ),
            6 => 
            array (
                'id' => 7,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317208.jpg',
                'created_at' => '2025-07-12 10:46:51',
                'updated_at' => '2025-07-12 10:46:51',
            ),
            7 => 
            array (
                'id' => 8,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317211.jpg',
                'created_at' => '2025-07-12 10:46:55',
                'updated_at' => '2025-07-12 10:46:55',
            ),
            8 => 
            array (
                'id' => 9,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317215.jpg',
                'created_at' => '2025-07-12 10:46:55',
                'updated_at' => '2025-07-12 10:46:55',
            ),
            9 => 
            array (
                'id' => 11,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317216.jpg',
                'created_at' => '2025-07-12 10:46:56',
                'updated_at' => '2025-07-12 10:46:56',
            ),
            10 => 
            array (
                'id' => 13,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317217.jpg',
                'created_at' => '2025-07-12 10:46:58',
                'updated_at' => '2025-07-12 10:46:58',
            ),
            11 => 
            array (
                'id' => 14,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317218.jpg',
                'created_at' => '2025-07-12 10:46:59',
                'updated_at' => '2025-07-12 10:46:59',
            ),
            12 => 
            array (
                'id' => 15,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317219.jpg',
                'created_at' => '2025-07-12 10:46:59',
                'updated_at' => '2025-07-12 10:46:59',
            ),
            13 => 
            array (
                'id' => 16,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317219.jpg',
                'created_at' => '2025-07-12 10:47:03',
                'updated_at' => '2025-07-12 10:47:03',
            ),
            14 => 
            array (
                'id' => 17,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317223.jpg',
                'created_at' => '2025-07-12 10:47:06',
                'updated_at' => '2025-07-12 10:47:06',
            ),
            15 => 
            array (
                'id' => 31,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317619.jpg',
                'created_at' => '2025-07-12 10:53:39',
                'updated_at' => '2025-07-12 10:53:39',
            ),
            16 => 
            array (
                'id' => 32,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317620.jpg',
                'created_at' => '2025-07-12 10:53:42',
                'updated_at' => '2025-07-12 10:53:42',
            ),
            17 => 
            array (
                'id' => 33,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317623.jpg',
                'created_at' => '2025-07-12 10:53:44',
                'updated_at' => '2025-07-12 10:53:44',
            ),
            18 => 
            array (
                'id' => 34,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317625.jpg',
                'created_at' => '2025-07-12 10:53:46',
                'updated_at' => '2025-07-12 10:53:46',
            ),
            19 => 
            array (
                'id' => 35,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317627.jpg',
                'created_at' => '2025-07-12 10:53:48',
                'updated_at' => '2025-07-12 10:53:48',
            ),
            20 => 
            array (
                'id' => 36,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317629.jpg',
                'created_at' => '2025-07-12 10:53:49',
                'updated_at' => '2025-07-12 10:53:49',
            ),
            21 => 
            array (
                'id' => 37,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317630.jpg',
                'created_at' => '2025-07-12 10:53:51',
                'updated_at' => '2025-07-12 10:53:51',
            ),
            22 => 
            array (
                'id' => 38,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317632.jpg',
                'created_at' => '2025-07-12 10:53:52',
                'updated_at' => '2025-07-12 10:53:52',
            ),
            23 => 
            array (
                'id' => 39,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317633.jpg',
                'created_at' => '2025-07-12 10:53:53',
                'updated_at' => '2025-07-12 10:53:53',
            ),
            24 => 
            array (
                'id' => 40,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317634.jpg',
                'created_at' => '2025-07-12 10:53:54',
                'updated_at' => '2025-07-12 10:53:54',
            ),
            25 => 
            array (
                'id' => 41,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317635.jpg',
                'created_at' => '2025-07-12 10:53:56',
                'updated_at' => '2025-07-12 10:53:56',
            ),
            26 => 
            array (
                'id' => 42,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317637.jpg',
                'created_at' => '2025-07-12 10:53:57',
                'updated_at' => '2025-07-12 10:53:57',
            ),
            27 => 
            array (
                'id' => 43,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752317638.jpg',
                'created_at' => '2025-07-12 10:53:58',
                'updated_at' => '2025-07-12 10:53:58',
            ),
            28 => 
            array (
                'id' => 44,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752318322.jpg',
                'created_at' => '2025-07-12 11:05:23',
                'updated_at' => '2025-07-12 11:05:23',
            ),
            29 => 
            array (
                'id' => 45,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752318324.jpg',
                'created_at' => '2025-07-12 11:05:25',
                'updated_at' => '2025-07-12 11:05:25',
            ),
            30 => 
            array (
                'id' => 46,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752318326.jpg',
                'created_at' => '2025-07-12 11:05:26',
                'updated_at' => '2025-07-12 11:05:26',
            ),
            31 => 
            array (
                'id' => 47,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752318327.jpg',
                'created_at' => '2025-07-12 11:05:27',
                'updated_at' => '2025-07-12 11:05:27',
            ),
            32 => 
            array (
                'id' => 48,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752318328.jpg',
                'created_at' => '2025-07-12 11:05:29',
                'updated_at' => '2025-07-12 11:05:29',
            ),
            33 => 
            array (
                'id' => 49,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752318330.jpg',
                'created_at' => '2025-07-12 11:05:30',
                'updated_at' => '2025-07-12 11:05:30',
            ),
            34 => 
            array (
                'id' => 50,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319133.jpg',
                'created_at' => '2025-07-12 11:18:54',
                'updated_at' => '2025-07-12 11:18:54',
            ),
            35 => 
            array (
                'id' => 51,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319135.jpg',
                'created_at' => '2025-07-12 11:18:55',
                'updated_at' => '2025-07-12 11:18:55',
            ),
            36 => 
            array (
                'id' => 52,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319136.jpg',
                'created_at' => '2025-07-12 11:18:56',
                'updated_at' => '2025-07-12 11:18:56',
            ),
            37 => 
            array (
                'id' => 53,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319233.jpg',
                'created_at' => '2025-07-12 11:20:34',
                'updated_at' => '2025-07-12 11:20:34',
            ),
            38 => 
            array (
                'id' => 54,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319235.jpg',
                'created_at' => '2025-07-12 11:20:35',
                'updated_at' => '2025-07-12 11:20:35',
            ),
            39 => 
            array (
                'id' => 55,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319236.jpg',
                'created_at' => '2025-07-12 11:20:36',
                'updated_at' => '2025-07-12 11:20:36',
            ),
            40 => 
            array (
                'id' => 56,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319403.jpg',
                'created_at' => '2025-07-12 11:23:24',
                'updated_at' => '2025-07-12 11:23:24',
            ),
            41 => 
            array (
                'id' => 57,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319405.jpg',
                'created_at' => '2025-07-12 11:23:25',
                'updated_at' => '2025-07-12 11:23:25',
            ),
            42 => 
            array (
                'id' => 58,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319962.jpg',
                'created_at' => '2025-07-12 11:32:43',
                'updated_at' => '2025-07-12 11:32:43',
            ),
            43 => 
            array (
                'id' => 59,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319964.jpg',
                'created_at' => '2025-07-12 11:32:44',
                'updated_at' => '2025-07-12 11:32:44',
            ),
            44 => 
            array (
                'id' => 60,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319965.jpg',
                'created_at' => '2025-07-12 11:32:46',
                'updated_at' => '2025-07-12 11:32:46',
            ),
            45 => 
            array (
                'id' => 61,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752319967.jpg',
                'created_at' => '2025-07-12 11:32:47',
                'updated_at' => '2025-07-12 11:32:47',
            ),
        ));
        
        
    }
}