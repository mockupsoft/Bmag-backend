<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserNewsViewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_news_views')->delete();
        
        \DB::table('user_news_views')->insert(array (
            0 => 
            array (
                'id' => 3,
                'user_id' => 4,
                'news_id' => 14,
                'created_at' => '2025-07-08 11:14:13',
                'updated_at' => '2025-07-08 11:14:13',
            ),
        ));
        
        
    }
}