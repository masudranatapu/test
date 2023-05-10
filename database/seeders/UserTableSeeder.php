<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert([
            'role_id'=> '1',
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'status' => 1,
        ]);

        User::insert([
            'role_id'=> '2',
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'status' => 0,
        ]);
        
    }
}
