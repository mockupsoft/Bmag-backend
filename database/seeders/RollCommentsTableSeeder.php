<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RollCommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roll_comments')->delete();
        
        \DB::table('roll_comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 4,
                'roll_id' => 1,
                'comment' => 'Bu bir deneme yorumudur',
                'approved_at' => '2025-06-27 12:11:40',
                'approved_by' => 3,
                'ip' => NULL,
                'created_at' => '2025-06-27 10:43:25',
                'updated_at' => '2025-06-27 12:11:40',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 4,
                'roll_id' => 1,
                'comment' => 'Bu bir deneme yorumudur',
                'approved_at' => '2025-06-27 12:17:27',
                'approved_by' => 3,
                'ip' => NULL,
                'created_at' => '2025-06-27 10:43:45',
                'updated_at' => '2025-06-27 12:17:27',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 4,
                'roll_id' => 1,
                'comment' => 'Bu bir deneme yorumudur',
                'approved_at' => NULL,
                'approved_by' => NULL,
                'ip' => NULL,
                'created_at' => '2025-06-27 10:44:21',
                'updated_at' => '2025-06-27 10:44:21',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'roll_id' => 1,
                'comment' => 'Bu bir deneme yorumudur',
                'approved_at' => NULL,
                'approved_by' => NULL,
                'ip' => '127.0.0.1',
                'created_at' => '2025-06-27 10:45:01',
                'updated_at' => '2025-06-27 10:45:01',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 4,
                'roll_id' => 1,
                'comment' => 'Bu bir deneme yorumudur',
                'approved_at' => NULL,
                'approved_by' => NULL,
                'ip' => '127.0.0.1',
                'created_at' => '2025-06-27 10:51:51',
                'updated_at' => '2025-06-27 10:51:51',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 4,
                'roll_id' => 1,
                'comment' => 'Bu bir deneme yorumudur',
                'approved_at' => NULL,
                'approved_by' => NULL,
                'ip' => '127.0.0.1',
                'created_at' => '2025-06-27 10:52:03',
                'updated_at' => '2025-06-27 10:52:03',
            ),
        ));
        
        
    }
}