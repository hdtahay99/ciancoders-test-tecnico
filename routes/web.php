<?php

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

Route::get('/', [App\Http\Controllers\InicioController::class, 'index'] );

Auth::routes();

Route::get('/catalogos', [App\Http\Controllers\CatalogoController::class, 'index']);
Route::get('/catalogos/create', [App\Http\Controllers\CatalogoController::class, 'create']);
Route::get('/catalogos/listar', [App\Http\Controllers\CatalogoController::class, 'getCatalogos']);
Route::get('/catalogos/show', [App\Http\Controllers\CatalogoController::class, 'show']);
Route::post('/catalogos/post', [App\Http\Controllers\CatalogoController::class, 'store']);
Route::put('/catalogos/eliminar', [App\Http\Controllers\CatalogoController::class, 'desactivar']);

Route::get('/producto/search', [App\Http\Controllers\InicioController::class, 'search'] )->name('buscar.show');



Route::get('/categorias', [App\Http\Controllers\CategoriaController::class, 'getCategorias']);