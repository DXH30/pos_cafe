<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            array(
                'name' => 'umum'
            ),
            array(
                'name' => 'makanan'
            ),
            array(
                'name' => 'fashion'
            ),
            array(
                'name' => 'lainnya'
            )
        ];

        DB::table('categories')->insert($categories);
    }
}
