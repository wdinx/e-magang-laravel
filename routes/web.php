<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login.index');
})-> middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/register', RegisterController::class)->except('');


// Route::post('/register', [RegisterController::class, 'store']);
// Route::get('/register', [RegisterController::class, 'index']);

Route::group(['middleware'=>['isAdmin']], function(){
    Route::resource('/dashboard', DashboardController::class);
    Route::get('/admin/user', [StudentController::class, 'index']);
    Route::post('/admin/user', [StudentController::class, 'store']);
});

Route::group(['middleware'=>['isStudent']], function(){
    Route::get('/user', [StudentController::class, 'index']);
});





