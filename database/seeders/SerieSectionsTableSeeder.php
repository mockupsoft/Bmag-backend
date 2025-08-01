<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SerieSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('serie_sections')->delete();
        
        \DB::table('serie_sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'serie_id' => 1,
                'serie_season_id' => 1,
                'name' => 'Babamın Gizemi Kocamın Kader-1',
                'slug' => 'babamin-gizemi-kocamin-kader-1',
                'description' => 'İlk bölüm açıklama',
                'views' => 0,
                'video_path' => 'https://past-service.s3.eu-north-1.amazonaws.com/videos/Babamın-Gizemi-Kocamın-Kader-1/output.m3u8',
                'locked' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'serie_id' => 1,
                'serie_season_id' => 1,
                'name' => 'Babamın Gizemi Kocamın Kader-2',
                'slug' => 'babamin-gizemi-kocamin-kader-2',
                'description' => 'İkinci bölüm açıklama',
                'views' => 0,
                'video_path' => 'https://past-service.s3.eu-north-1.amazonaws.com/videos/Babamın-Gizemi-Kocamın-Kader-2/output.m3u8',
                'locked' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'serie_id' => 1,
                'serie_season_id' => 2,
                'name' => 'Babamın Gizemi Kocamın Kader-3',
                'slug' => 'babamin-gizemi-kocamin-kader-3',
                'description' => 'Üçüncü bölüm açıklama',
                'views' => 0,
                'video_path' => 'https://past-service.s3.eu-north-1.amazonaws.com/videos/Babamın-Gizemi-Kocamın-Kader-3/output.m3u8',
                'locked' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'serie_id' => 2,
                'serie_season_id' => 1,
                'name' => 'Dövüş Sanati Bebeği-1',
                'slug' => 'dovus-sanati-bebegi-1',
                'description' => 'İlk bölüm açıklama',
                'views' => 0,
                'video_path' => 'https://past-service.s3.eu-north-1.amazonaws.com/videos/Dovus-Sanatı-Gebegi-1/output.m3u8',
                'locked' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'serie_id' => 2,
                'serie_season_id' => 1,
                'name' => 'Dövüş Sanati Bebeği-2',
                'slug' => 'dovus-sanati-bebegi-2',
                'description' => 'İkinci bölüm açıklama',
                'views' => 0,
                'video_path' => 'https://past-service.s3.eu-north-1.amazonaws.com/videos/Dovus-Sanatı-Gebegi-2/output.m3u8',
                'locked' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'serie_id' => 2,
                'serie_season_id' => 2,
                'name' => 'Dövüş Sanati Bebeği-3',
                'slug' => 'dovus-sanati-bebegi-3',
                'description' => 'Üçüncü bölüm açıklama',
                'views' => 0,
                'video_path' => 'https://past-service.s3.eu-north-1.amazonaws.com/videos/Dovus-Sanatı-Gebegi-3/output.m3u8',
                'locked' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}