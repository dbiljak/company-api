<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// PASSPORT
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('user-details', 'UserController@userDetails');
});

// COMPANIES
Route::get('companies', 'CompanyController@index');
Route::get('company/{id}', 'CompanyController@show');
Route::post('company', 'CompanyController@store');
Route::put('company', 'CompanyController@store');
Route::delete('company/{id}', 'CompanyController@destroy');

Route::group(['middleware' => ['auth:api', 'role:admin']], function () {
    // ROLES
    Route::get('roles', 'RoleController@index');
    Route::post('role', 'RoleController@store');
    Route::post('add-roles-to-user', 'RoleController@addRolesToUser');
    Route::get('role/{id}', 'RoleController@show');
    Route::delete('role/{id}', 'RoleController@destroy');

    // PERMISSIONS
    Route::get('permissions', 'PermissionController@index');
    Route::post('permission', 'PermissionController@store');
    Route::post('add-permissions-to-user', 'PermissionController@addPermissionsToUser');
    Route::post('add-permissions-to-role', 'PermissionController@addPermissionsToRole');
    Route::get('permission/{id}', 'PermissionController@show');
    Route::delete('permission/{id}', 'PermissionController@destroy');
});

// PRODUCTS
