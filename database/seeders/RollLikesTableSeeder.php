<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RollLikesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roll_likes')->delete();
        
        \DB::table('roll_likes')->insert(array (
            0 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'roll_id' => 1,
                'created_at' => '2025-06-27 11:52:20',
                'updated_at' => '2025-06-27 11:52:20',
            ),
            1 => 
            array (
                'id' => 5,
                'user_id' => 4,
                'roll_id' => 1,
                'created_at' => '2025-06-27 11:52:20',
                'updated_at' => '2025-06-27 11:52:20',
            ),
            2 => 
            array (
                'id' => 6,
                'user_id' => 4,
                'roll_id' => 1,
                'created_at' => '2025-06-27 11:52:20',
                'updated_at' => '2025-06-27 11:52:20',
            ),
            3 => 
            array (
                'id' => 7,
                'user_id' => 4,
                'roll_id' => 1,
                'created_at' => '2025-06-27 11:52:20',
                'updated_at' => '2025-06-27 11:52:20',
            ),
            4 => 
            array (
                'id' => 8,
                'user_id' => 4,
                'roll_id' => 1,
                'created_at' => '2025-06-27 11:52:20',
                'updated_at' => '2025-06-27 11:52:20',
            ),
        ));
        
        
    }
}