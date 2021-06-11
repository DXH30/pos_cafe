<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            array(
                'name' => "Administrator",
                'email' => "admin@email.com",
                'password' => Hash::make('password123'),
                'group_id' => 1
            ),
            array(
                'name' => "User",
                'email' => "user@email.com",
                'password' => Hash::make('password123'),
                'group_id' => 1
            ),
        ];
        DB::table('users')->insert($users);
    }
}
