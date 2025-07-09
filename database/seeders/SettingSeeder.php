<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::setValue('site_name', 'Haber Sitem');
        Setting::setValue('meta_title', 'En Güncel Haberler');
        Setting::setValue('meta_description', 'Anında haber alın.');
        Setting::setValue('email', 'info@bigmedya.dev');
        Setting::setValue('maintenance_mode', false);
        Setting::setValue('google_analytics', "wqe");
        Setting::setValue('google_search_console', "Google Search Console Doğrulama Kodu");
        Setting::setValue('facebook_piksel_code', "Facebook Pixel Kodu");
        Setting::setValue('facebook_page_url', "Facebook Sayfa URL");
        Setting::setValue('twitter_profile_url', "Twitter/X Profil URL");
        Setting::setValue('instagram_profile_url', "Instagram Profile Url");
        Setting::setValue('youtube_channel_url', "Youtube Url");
    }
}
