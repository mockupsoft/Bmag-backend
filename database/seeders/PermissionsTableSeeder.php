<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'create post',
                'guard_name' => 'api',
                'label' => 'Gönderi Oluşturma',
                'category' => 'Gönderi',
                'description' => NULL,
                'created_at' => '2025-06-08 17:32:53',
                'updated_at' => '2025-06-08 17:32:53',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'edit post',
                'guard_name' => 'api',
                'label' => 'Gönderi Düzenleme',
                'category' => 'Gönderi',
                'description' => NULL,
                'created_at' => '2025-06-08 17:32:53',
                'updated_at' => '2025-06-08 17:32:53',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'publish post',
                'guard_name' => 'api',
                'label' => 'Gönderi Yayınlama',
                'category' => 'Gönderi',
                'description' => NULL,
                'created_at' => '2025-06-08 17:32:53',
                'updated_at' => '2025-06-08 17:32:53',
            ),
        ));
        
        
    }
}