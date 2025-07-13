<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name_surname' => 'Muharrem Özdemir',
                'email' => 'ozdemir.muharrem34@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$DDPg/wxYrTRN8KuhGQVyj.9EtNs5GTH5B28lG9RKOPVJT0P20XGVK',
                'profile_image' => NULL,
                'phone_number' => '5423024234',
                'phone_verification_code' => '40230',
                'phone_is_verified' => 0,
                'remember_token' => NULL,
                'created_at' => '2025-06-27 08:32:09',
                'updated_at' => '2025-06-27 08:32:09',
            ),
            1 => 
            array (
                'id' => 4,
                'name_surname' => 'Roll Kullanıcı 1',
                'email' => 'roll-kullanici@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$IhMG1FfOQENvJcFXOyjkte7K.ooCN8iIDM77jAGD4PcXs7gyUVeAS',
                'profile_image' => NULL,
                'phone_number' => '5423024235',
                'phone_verification_code' => '57824',
                'phone_is_verified' => 0,
                'remember_token' => NULL,
                'created_at' => '2025-06-27 08:37:14',
                'updated_at' => '2025-06-27 13:43:56',
            ),
        ));
        
        
    }
}