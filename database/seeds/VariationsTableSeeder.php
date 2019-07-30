<?php

use Illuminate\Database\Seeder;

class VariationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('variations')->delete();

        \DB::table('variations')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Red',
                'variation_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Green',
                'variation_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Blue',
                'variation_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Small',
                'variation_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Large',
                'variation_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
