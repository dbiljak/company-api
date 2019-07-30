<?php

use Illuminate\Database\Seeder;

class VariationCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('variation_categories')->delete();

        \DB::table('variation_categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Color',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Size',
                'created_at' => now(),
                'updated_at' => now(),
            )
        ));
    }
}
