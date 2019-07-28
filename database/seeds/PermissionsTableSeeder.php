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
                'name' => 'create_user',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'create_company',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'create_product',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'view_user',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'view_company',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'view_product',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'update_user',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'update_company',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'update_product',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'delete_user',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'delete_company',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'delete_product',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
    }
}
