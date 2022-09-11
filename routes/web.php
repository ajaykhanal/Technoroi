<?php

use App\Http\Controllers\Admin\BackendController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\User\UserBackendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


//12345
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/user-dashboard',[UserBackendController::class,'user_dashboard'])->name('user_dashboard');
//suprim12345

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('add-to-favourite/{id}',[HomeController::class,'add_to_favourite'])->name('add_to_favourite');
Route::get('my-favourites',[HomeController::class,'my_favourites'])->name('my_favourites');
Route::get('all-favourites-movies',[HomeController::class,'all_favourite_movies'])->name('all_favourite_movies');
Route::get('register',[HomeController::class,'custom_register'])->name('custom_register');
Route::post('register',[HomeController::class,'register_data'])->name('register_data');
Route::get('login',[HomeController::class,'custom_login'])->name('custom_login');
Route::post('login_data',[HomeController::class,'login_data'])->name('login_data');
Route::get('/logout',[BackendController::class,'logout'])->name('logout');
Route::get('/users-list',[BackendController::class,'users_list'])->name('users_list');
Route::get('/update_user/{id}',[BackendController::class,'update_user'])->name('update_user');
Route::post('/role-updated/{id}',[BackendController::class,'role_updated'])->name('role_updated');
Route::get('add-movie',[MovieController::class,'add_movie'])->name('add_movie');
Route::post('movie-data',[MovieController::class,'movie_data'])->name('movie_data');
Route::get('movies',[MovieController::class,'index'])->name('movies');
Route::get('edit-movie/{id}',[MovieController::class,'edit'])->name('edit');
Route::post('update-movie/{id}',[MovieController::class,'update_movie'])->name('update_movie');
Route::get('delete-movie/{id}',[MovieController::class,'delete_movie'])->name('delete_movie');

Route::post('search-date',[MovieController::class,'search_data'])->name('search_data');
