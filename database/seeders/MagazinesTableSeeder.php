<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MagazinesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('magazines')->delete();
        
        \DB::table('magazines')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Hello',
                'slug' => 'hello',
                'description' => '<p>qweqweqw</p>',
                'image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'robots' => 'index, follow',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2025-07-08 08:35:52',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Ceo Life',
                'slug' => 'ceo-life',
                'description' => NULL,
                'image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'robots' => 'index, follow',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Deneme dergisi',
                'slug' => '',
                'description' => '<p>Deneme dergisi</p>',
                'image' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1750406577.jpeg',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => NULL,
                'robots' => 'index, follow',
                'is_active' => 1,
                'created_at' => '2025-06-20 08:02:57',
                'updated_at' => '2025-06-20 08:02:58',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'Formsante',
                'slug' => 'formsante',
                'description' => '<p>Formsante</p>',
                'image' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1751959232.png',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => NULL,
                'robots' => 'index, follow',
                'is_active' => 1,
                'created_at' => '2025-07-08 07:20:32',
                'updated_at' => '2025-07-08 07:20:33',
            ),
            4 => 
            array (
                'id' => 9,
                'name' => 'Elleman',
                'slug' => 'elleman',
                'description' => '<p>Elle dergisi</p>',
                'image' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1751965352.svg',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => NULL,
                'robots' => 'index, follow',
                'is_active' => 1,
                'created_at' => '2025-07-08 09:02:32',
                'updated_at' => '2025-07-08 09:02:33',
            ),
            5 => 
            array (
                'id' => 10,
                'name' => 'Maison Française',
                'slug' => 'maison-francaise',
                'description' => '<p>Maison Française</p>',
                'image' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1751965540.png',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => NULL,
                'robots' => 'index, follow',
                'is_active' => 1,
                'created_at' => '2025-07-08 09:05:40',
                'updated_at' => '2025-07-08 09:05:40',
            ),
        ));
        
        
    }
}