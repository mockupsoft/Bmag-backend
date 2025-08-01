<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Gündem',
                'slug' => 'gundem',
                'description' => NULL,
                'image' => NULL,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => NULL,
                'robots' => 'index, follow',
                'order' => 9999,
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => '2025-06-20 07:26:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bilim & Teknoloji',
                'slug' => 'bilim-teknoloji',
                'description' => NULL,
                'image' => NULL,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => NULL,
                'robots' => 'index, follow',
                'order' => 9999,
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Finans',
                'slug' => 'finans',
                'description' => NULL,
                'image' => NULL,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => NULL,
                'robots' => 'index, follow',
                'order' => 9999,
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Yaşam',
                'slug' => 'yasam',
                'description' => NULL,
                'image' => NULL,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => NULL,
                'robots' => 'index, follow',
                'order' => 9999,
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Spor',
                'slug' => 'spor',
                'description' => NULL,
                'image' => NULL,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => NULL,
                'robots' => 'index, follow',
                'order' => 9999,
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Eğlence',
                'slug' => 'eglence',
                'description' => NULL,
                'image' => NULL,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'canonical_url' => NULL,
                'seo_image' => NULL,
                'robots' => 'index, follow',
                'order' => 9999,
                'is_active' => 1,
                'created_at' => '2025-06-18 13:48:39',
                'updated_at' => '2025-06-18 13:48:39',
            ),
        ));
        
        
    }
}