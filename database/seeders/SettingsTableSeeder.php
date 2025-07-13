<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'site_name',
                'value' => 'Haber Sitem',
                'created_at' => '2025-07-09 07:18:07',
                'updated_at' => '2025-07-09 07:31:13',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'meta_title',
                'value' => 'En Güncel Haberler',
                'created_at' => '2025-07-09 07:18:07',
                'updated_at' => '2025-07-09 07:18:07',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'meta_description',
                'value' => 'Anında haber alın.',
                'created_at' => '2025-07-09 07:18:07',
                'updated_at' => '2025-07-09 07:18:07',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'email',
                'value' => 'info@bigmedya.dev',
                'created_at' => '2025-07-09 07:18:07',
                'updated_at' => '2025-07-09 07:18:07',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'maintenance_mode',
                'value' => '0',
                'created_at' => '2025-07-09 07:18:07',
                'updated_at' => '2025-07-09 07:46:04',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'google_analytics',
                'value' => 'wqe',
                'created_at' => '2025-07-09 07:46:04',
                'updated_at' => '2025-07-09 07:46:04',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'google_search_console',
                'value' => 'Google Search Console Doğrulama Kodu',
                'created_at' => '2025-07-09 07:46:04',
                'updated_at' => '2025-07-09 07:46:04',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'facebook_piksel_code',
                'value' => 'Facebook Pixel Kodu',
                'created_at' => '2025-07-09 07:46:04',
                'updated_at' => '2025-07-09 07:46:04',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'facebook_page_url',
                'value' => 'Facebook Sayfa URL',
                'created_at' => '2025-07-09 07:46:04',
                'updated_at' => '2025-07-09 07:46:04',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'twitter_profile_url',
                'value' => 'Twitter/X Profil URL',
                'created_at' => '2025-07-09 07:46:04',
                'updated_at' => '2025-07-09 07:46:04',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'instagram_profile_url',
                'value' => 'Instagram Profile Url',
                'created_at' => '2025-07-09 07:46:04',
                'updated_at' => '2025-07-09 07:46:04',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'youtube_channel_url',
                'value' => 'Youtube Url',
                'created_at' => '2025-07-09 07:46:04',
                'updated_at' => '2025-07-09 07:46:04',
            ),
        ));
        
        
    }
}