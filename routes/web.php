<?php
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Dependencia\DependenciaController;
use App\Models\User;
use App\Models\Dependencia;
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


// Main Page Route
Route::get('/', $controller_path . '\HomeController@index')->name('home-index');

//User
Route::prefix('user')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('user.index');
    Route::post('/store', 'store')->name('user.store');
    Route::get('/get', 'get')->name('user.get');
    Route::get('/delete/{user}', 'delete')->name('user.delete');
    Route::post('/update/{user}', 'update')->name('user.update');
    Route::get('/getData/{user}', 'getData')->name('user.get.data');
});
//Dependencia
Route::prefix('dependencia')->controller(DependenciaController::class)->group(function () {
    Route::get('/', 'index')->name('dependencia.index');
    Route::post('/store', 'store')->name('dependencia.store');
    Route::get('/get', 'get')->name('dependencia.get');
    Route::get('/delete/{dependencia}', 'delete')->name('dependencia.delete');
    Route::post('/update/{dependencia}', 'update')->name('dependencia.update');


});