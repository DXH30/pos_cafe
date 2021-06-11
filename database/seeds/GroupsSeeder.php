<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $groups = [
            array(
                'name' => 'administrator',
                'level' => '0'
            ),
            array(
                'name' => 'user',
                'level' => '1'
            ),
            array(
                'name' => 'customer',
                'level' => '2'
            ),
            array(
                'name' => 'guest',
                'level' => '3'
            )
        ];

        DB::table('groups')->insert($groups);
    }
}
