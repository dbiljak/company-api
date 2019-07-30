<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class OneTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_in_database = User::role('admin')->first();
        if ($admin_in_database) {
            return response()->json(['error'=>'Route allready triggered'], 500);
        }

        // CREATE ADMIN
        $admin = new User;

        $admin->name = "Admin";
        $admin->email = "admin@admin.com";
        $admin->password = bcrypt('admin');
        $admin->created_at = now();
        $admin->updated_at = now();
        $admin->save();

        $admin->assignRole('admin');

        // CREATE OWNER
        $owner = new User;

        $owner->name = "Owner";
        $owner->email = "owner@owner.com";
        $owner->password = bcrypt('owner');
        $owner->created_at = now();
        $owner->updated_at = now();
        $owner->save();

        $owner->assignRole('owner');

        // CREATE USER
        $user = new User;

        $user->name = "User";
        $user->email = "user@user.com";
        $user->password = bcrypt('user');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('user');

        // CREATE USER WITH update_company PERMISSION
        $user_update = new User;

        $user_update->name = "User Update";
        $user_update->email = "userupdate@userupdate.com";
        $user_update->password = bcrypt('userupdate');
        $user_update->created_at = now();
        $user_update->updated_at = now();
        $user_update->save();

        $user_update->assignRole('user');
        $user_update->givePermissionTo('update_company');

        $new_users = [$admin, $owner, $user, $user_update];

        return response()->json(['success' => $new_users], 200);
    }
}
