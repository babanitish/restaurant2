<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[Clientcontroller::class, 'home']);
Route::get('/menu',[Clientcontroller::class, 'menu']);
Route::get('/about',[Clientcontroller::class, 'about']);
Route::get('/book',[Clientcontroller::class, 'book']);

Route::get('/redirects',[Clientcontroller::class, 'redirects']);

Route::put('/profile',[Clientcontroller::class, 'profileUpdate'])->name('profile.update');

Route::get('/users',[Admincontroller::class, 'user']);
Route::get('/deleteuser/{id}',[Admincontroller::class, 'deleteuser']);



Route::group(['>middleware' => 'auth'],function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});
require __DIR__.'/auth.php';
