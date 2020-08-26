<?php

use App\Post;
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

    $post = new Post(['title' => 'post title', 'body' => 'post body']);

    $user->posts()->save($post);

    echo "Done!";
});