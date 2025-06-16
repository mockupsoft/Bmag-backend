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
            1 => 
            array (
                'id' => 2,
                'name' => 'Form Sante',
                'slug' => 'form-sante',
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
        ));
        
        
    }
}