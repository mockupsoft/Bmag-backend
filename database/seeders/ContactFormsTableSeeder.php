<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactFormsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_forms')->delete();
        
        
        
    }
}