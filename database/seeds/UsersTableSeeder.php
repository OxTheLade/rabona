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

            'name'=>'Admin',
            'email'=>'admin@example.com',
            'password'=> bcrypt('Admin1234'),
            'is_active'=> 1,
            'role_id'=>3,
            'photo_id'=>1


        ]);
    }
}
