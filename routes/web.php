<?php
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Unidad\UnidadController;
use App\Http\Controllers\Periodo\PeriodoController;
use App\Http\Controllers\Dependencia\DependenciaController;
use App\Http\Controllers\Roles\RolesController;
use App\Http\Controllers\Permisos\PermisosController;
use App\Http\Controllers\Programacion\EstrategiaController;
use App\Http\Controllers\Programacion\HechoController;
use App\Http\Controllers\Programacion\MetaDeProductoController;
use App\Http\Controllers\Programacion\PoliticaController;
use App\Http\Controllers\Programacion\ProgramaController;
use App\Http\Controllers\Proyecto\ProyectoController;
use App\Http\Controllers\Proyecto\ProyectoMovimientosFinancierosController;
use App\Http\Controllers\Proyecto\ProyectoPresupuestoController;
use App\Http\Controllers\Proyecto\ProyectoPresupuestosController;
use App\Http\Controllers\Proyecto\ProyectoProductosController;
use App\Http\Controllers\Proyecto\ProyectosController;
use App\Models\Users;
use App\Models\Unidades;
use App\Models\Periodos;
use App\Models\Dependencias;
use App\Models\Estrategia;
use App\Models\Roles;
use App\Models\Permisos;
use App\Models\ProyectoMovimientoFinanciero;
use App\Models\ProyectoProducto;
use App\Models\User;
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


Route::get('/test', function () {
    $user = new User([
        'nombre' => 'admin',
        'apellido' => 'admin',
        'email' => 'admin@hotmail.com',
        'documento' => '12345',
        'usuario' => 'admin',
        'password' => '12345678',

    ]);
    $user->save();
    return $user;
});
// Main Page Route

Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login-index');
Route::redirect('/', '/login', 301);

Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'log'])->name('login.submit');
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    //User
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home-index');
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
        Route::post('/asignar', 'asignar')->name('periodo.asignar');
        Route::get('/get', 'get')->name('periodo.get');
        Route::get('/get-by-user', 'getUserPeriodo')->name('periodo.get.user.periodo');
        Route::get('/delete/asignacion/{relacion}', 'deleteAsignacion')->name('periodo.delete.asignacion');
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

    Route::prefix('metas-productos')->controller(MetaDeProductoController::class)->group(function () {
        Route::post('/store/evidencias', 'storeEvidencias')->name('metas-productos.store.evidencias');
        Route::get('/evidencias', 'indexEvidencias')->name('metas-productos.evidencias.index');
        Route::get('/evidencias/form/{meta}', 'indexEvidenciasForm')->name('metas-productos.evidencias.form.index');
    });

    Route::get('/resultados', function(){
        return view('resultados.index');
    })->name('resultados');


    Route::resource('hechos', HechoController::class);
    Route::get('/hechos-get', [HechoController::class, 'get'])->name('hechos.get');

    Route::resource('politicas', PoliticaController::class);
    Route::get('/politicas-get', [PoliticaController::class, 'get'])->name('politicas.get');

    Route::resource('estrategias', EstrategiaController::class);
    Route::get('/estrategias-get', [EstrategiaController::class, 'get'])->name('politicas.get');

    Route::resource('programas', ProgramaController::class);
    Route::get('/programas-get', [ProgramaController::class, 'get'])->name('programas.get');

    Route::resource('metas-productos', MetaDeProductoController::class);
    Route::get('/metas-productos-get', [MetaDeProductoController::class, 'get'])->name('metas-productos.get');
    Route::get('/metas-productos-get-by-user', [MetaDeProductoController::class, 'getByUser'])->name('metas-productos.get.by.user');

    Route::get('/indicadores-get', [MetaDeProductoController::class, 'getIndicadores'])->name('indicadores-get');

    //plan operativo anual
    Route::resource('proyectos', ProyectosController::class);
    Route::get('/proyectos-get', [ProyectosController::class, 'get'])->name('proyectos.get');
    Route::get('/proyectos-get-all/{id}', [ProyectosController::class, 'getAll'])->name('proyectos.get.all');

    Route::resource('proyectos-productos', ProyectoProductosController::class);

    Route::resource('proyecto-presupuestos', ProyectoPresupuestosController::class);

    Route::resource('proyectos-movimientos', ProyectoMovimientosFinancierosController::class);


});


