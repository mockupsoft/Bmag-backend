<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SerieSeasonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('serie_seasons')->delete();
        
        \DB::table('serie_seasons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'serie_id' => 1,
                'name' => '1.Sezon',
                'row' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'serie_id' => 1,
                'name' => '2.Sezon',
                'row' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'serie_id' => 2,
                'name' => '1.Sezon',
                'row' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'serie_id' => 2,
                'name' => '2.Sezon',
                'row' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}