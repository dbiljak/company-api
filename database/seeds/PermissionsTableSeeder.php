<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'edit_user',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'edit_company',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'edit_product',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'create_user',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'create_company',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'create_product',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'view_user',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'view_company',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'view_product',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'view_product',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
