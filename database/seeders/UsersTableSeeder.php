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
                'id' => 1,
                'name_surname' => 'Muharrem Özdemir',
                'email' => 'ozdemir.muharrem34@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$09jukJSVjYpS552W.ezY4O2AfJ/aFshEYbfdow6TKomZDg1M2DH1W',
                'phone_number' => '5423024234',
                'phone_verification_code' => '52406',
                'phone_is_verified' => 1,
                'remember_token' => NULL,
                'created_at' => '2025-06-14 12:43:59',
                'updated_at' => '2025-06-14 12:44:14',
            ),
        ));
        
        
    }
}