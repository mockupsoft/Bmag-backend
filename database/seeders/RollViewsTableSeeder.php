<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RollViewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roll_views')->delete();
        
        \DB::table('roll_views')->insert(array (
            0 => 
            array (
                'id' => 10,
                'user_id' => 4,
                'roll_id' => 1,
                'viewed_at' => '2025-06-27 10:54:16',
                'created_at' => '2025-06-27 10:54:16',
                'updated_at' => '2025-06-27 10:54:16',
            ),
            1 => 
            array (
                'id' => 15,
                'user_id' => 3,
                'roll_id' => 1,
                'viewed_at' => '2025-07-13 16:22:31',
                'created_at' => '2025-07-13 16:22:31',
                'updated_at' => '2025-07-13 16:22:31',
            ),
        ));
        
        
    }
}