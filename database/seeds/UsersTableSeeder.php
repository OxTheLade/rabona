<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([

            'name'=>'Mikail Kocak',
            'email'=>'mikail38@live.dk',
            'password'=> bcrypt('Oguzhan00'),
            'is_active'=> 1,
            'role_id'=>3,
            'photo_id'=>1


        ]);
    }
}
