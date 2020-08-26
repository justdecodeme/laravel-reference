<?php

use App\Role;
use App\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

/* ********* */
/* CREATE */
/* ********* */
Route::get('/create', function () {
    $user = User::findOrFail(1);

    $role = new Role(['name' => 'Administrator']);

    $user->roles()->save($role);

    echo "Done!";
});

/* ********* */
/* READ */
/* ********* */
Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {
        echo $role->name . "<br/>";
    }
});

/* ********* */
/* UPDATE */
/* ********* */
Route::get('/update', function () {
    $user = User::findOrFail(1);

    if ($user->has('roles')) {
        foreach ($user->roles as $role) {
            if ($role->name == 'Administrator') {
                $role->name = 'subscriber';
                $role->save();
                echo "Done!";
            }
        }

    }
});

/* ********* */
/* DELETE */
/* ********* */
Route::get('/delete', function () {
    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {
        $role->whereId(1)->delete();
        echo "Done!";
    }
});