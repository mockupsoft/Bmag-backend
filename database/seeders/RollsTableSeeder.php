<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RollsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rolls')->delete();
        
        \DB::table('rolls')->insert(array (
            0 => 
            array (
                'id' => 1,
                'magazine_id' => 3,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1750967374.mp4',
                'description' => 'qwewe',
                'created_at' => '2025-06-26 19:49:59',
                'updated_at' => '2025-06-26 19:49:59',
            ),
            1 => 
            array (
                'id' => 2,
                'magazine_id' => 3,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1750967374.mp4',
                'description' => 'qwewe',
                'created_at' => '2025-06-26 19:49:59',
                'updated_at' => '2025-06-26 19:49:59',
            ),
            2 => 
            array (
                'id' => 3,
                'magazine_id' => 3,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752682671.mp4',
                'description' => '<p>İlk Roll</p>',
                'created_at' => '2025-07-16 16:17:52',
                'updated_at' => '2025-07-16 16:17:52',
            ),
            3 => 
            array (
                'id' => 4,
                'magazine_id' => 3,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752682748.mp4',
                'description' => '<p>2. Roll</p>',
                'created_at' => '2025-07-16 16:19:10',
                'updated_at' => '2025-07-16 16:19:10',
            ),
            4 => 
            array (
                'id' => 5,
                'magazine_id' => 3,
                'path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1752682761.mp4',
                'description' => '3. roll',
                'created_at' => '2025-07-16 16:19:22',
                'updated_at' => '2025-07-16 16:19:22',
            ),
        ));
        
        
    }
}