<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Resources\Permission as PermissionResource;
use App\User;
use Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return PermissionResource::collection($permissions);
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

        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'api'
        ]);

        if ($permission) {
            return response()->json(['success' => $permission], 200);
        }

        return response()->json(['error'=>'Permission creation error'], 500);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPermissionsToUser(Request $request) {
        $user = User::where('id', $request->user_id)->first();
        $user->givePermissionTo($request->permissions);

        if ($user) {
            return response()->json(['success' => $user], 200);
        }

        return response()->json(['error'=>'Adding permission to user error'], 500);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPermissionsToRole(Request $request) {
        $role = Role::where('id', $request->role_id)->first();
        $role->syncPermissions($request->permissions);

        if ($role) {
            return response()->json(['success' => $role], 200);
        }

        return response()->json(['error'=>'Adding permission to role error'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return new PermissionResource($permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        $permission->delete();

        $response['success'] = true;
        $response['msg'] = "Permission " . $permission->name . " deleted!";

        return $response;
    }
}
