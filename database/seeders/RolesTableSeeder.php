<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'freelance editor',
                'label' => 'Freelance Editör',
                'guard_name' => 'api',
                'created_at' => '2025-06-08 17:32:53',
                'updated_at' => '2025-06-08 17:32:53',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'editor',
                'label' => 'Editör1',
                'guard_name' => 'api',
                'created_at' => '2025-06-08 17:32:53',
                'updated_at' => '2025-06-09 11:10:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'chief editor',
                'label' => 'Yazı İşleri Müdürü',
                'guard_name' => 'api',
                'created_at' => '2025-06-08 17:32:53',
                'updated_at' => '2025-06-08 17:32:53',
            ),
        ));
        
        
    }
}