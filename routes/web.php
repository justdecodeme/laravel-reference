<?php

use App\Address;
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

    $address = new Address(['name' => 'Sipani Phoenix Grande']);

    $user->address()->save($address);
});

/* ********* */
/* READ */
/* ********* */
Route::get('/read', function () {
    $user = User::findOrFail(1);

    echo $user->address->name;
});

/* ********* */
/* UPDATE */
/* ********* */
Route::get('/update', function () {
    // $address = Address::where('user_id', 1)->first();
    // $address = Address::where('user_id', '=', 1)->first();
    $address = Address::whereUserId(1)->first();

    $address->name = "Shreshta In";

    $address->save();
});

/* ********* */
/* DELETE */
/* ********* */
Route::get('/delete', function () {
    $user = User::findOrFail(1);

    $user->address()->delete();
});