<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 2,
            ),
            1 => 
            array (
                'permission_id' => 2,
                'role_id' => 2,
            ),
            2 => 
            array (
                'permission_id' => 3,
                'role_id' => 2,
            ),
        ));
        
        
    }
}