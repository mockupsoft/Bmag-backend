<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('series')->delete();
        
        \DB::table('series')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Babamın Gizemi Kocamın Kader',
                'slug' => 'babamin-gizemi-kocamin-kader',
                'description' => 'Açıklama',
                'cover_image' => '-',
                'row' => 1,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dövüş Sanatı Bebeği',
                'slug' => 'dovuz-sanati-bebegi',
                'description' => 'Açıklama',
                'cover_image' => '-',
                'row' => 2,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}