<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Resources\Role as RoleResource;
use App\User;
use Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return RoleResource::collection($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'api'
        ]);

        if ($role) {
            return response()->json(['success' => $role], 200);
        }

        return response()->json(['error'=>'Role creation error'], 500);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addRoleToUser(Request $request) {
        $user = User::where('id', $request->user_id)->first();
        $user->assignRole($request->role_name);

        if ($user) {
            return response()->json(['success' => $user], 200);
        }

        return response()->json(['error'=>'Adding role to user error'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return new RoleResource($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        $response['success'] = true;
        $response['msg'] = "Role " . $role->name . " deleted!";

        return $response;
    }
}
