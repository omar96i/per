<?php
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Unidad\UnidadController;
use App\Http\Controllers\Periodo\PeriodoController;
use App\Http\Controllers\Dependencia\DependenciaController;
use App\Http\Controllers\Roles\RolesController;
use App\Http\Controllers\Permisos\PermisosController;
use App\Models\Users;
use App\Models\Unidades;
use App\Models\Periodos;
use App\Models\Dependencias;
use App\Models\Roles;
use App\Models\Permisos;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home-index');

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
    Route::get('/', 'index')->name('dependencias.index');
    Route::post('/store', 'store')->name('dependencia.store');
    Route::get('/get', 'get')->name('dependencia.get');
    Route::get('/delete/{dependencia}', 'delete')->name('dependencia.delete');
    Route::post('/update/{dependencia}', 'update')->name('dependencia.update');
    Route::get('/getData/{dependencia}', 'getData')->name('dependencia.get.data');
});
//Periodo
Route::prefix('periodo')->controller(PeriodoController::class)->group(function () {
    Route::get('/', 'index')->name('periodo.index');
    Route::post('/store', 'store')->name('periodo.store');
    Route::get('/get', 'get')->name('periodo.get');
    Route::get('/delete/{periodo}', 'delete')->name('periodo.delete');
    Route::post('/update/{periodo}', 'update')->name('periodo.update');
    Route::get('/getData/{periodo}', 'getData')->name('periodo.get.data');
});
//Unidad de Medida
Route::prefix('unidad')->controller(UnidadController::class)->group(function () {
    Route::get('/', 'index')->name('unidad.index');
    Route::post('/store', 'store')->name('unidad.store');
    Route::get('/get', 'get')->name('unidad.get');
    Route::get('/delete/{unidad}', 'delete')->name('unidad.delete');
    Route::post('/update/{unidad}', 'update')->name('unidad.update');
    Route::get('/getData/{unidad}', 'getData')->name('unidad.get.data');
});
//Roles
Route::prefix('roles')->controller(RolesController::class)->group(function () {
    Route::get('/', 'index')->name('roles.index');
    Route::post('/store', 'store')->name('roles.store');
    Route::get('/get', 'get')->name('roles.get');
    Route::get('/delete/{roles}', 'delete')->name('roles.delete');
    Route::post('/update/{roles}', 'update')->name('roles.update');
    Route::get('/getData/{roles}', 'getData')->name('roles.get.data');
});
//Permisos
Route::prefix('permisos')->controller(PermisosController::class)->group(function () {
    Route::get('/', 'index')->name('permisos.index');
    Route::post('/store', 'store')->name('permisos.store');
    Route::get('/get', 'get')->name('permisos.get');
    Route::get('/delete/{permisos}', 'delete')->name('permisos.delete');
    Route::post('/update/{permisos}', 'update')->name('permisos.update');
    Route::get('/getData/{permisos}', 'getData')->name('permisos.get.data');
});