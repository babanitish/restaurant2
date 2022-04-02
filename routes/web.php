<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
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
Route::get('/',[Clientcontroller::class, 'home']);
Route::get('/menu',[Clientcontroller::class, 'menu']);
Route::get('/about',[Clientcontroller::class, 'about']);
Route::get('/book',[Clientcontroller::class, 'book']);

Route::get('/redirects',[Clientcontroller::class, 'redirects']);

// Route::get('/', function () {
//     return view('welcome');
// });


