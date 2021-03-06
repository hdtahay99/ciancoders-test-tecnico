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

Route::get('/catalogos', [App\Http\Controllers\CatalogoController::class, 'index'])->name('inven');
Route::get('/catalogos/create', [App\Http\Controllers\CatalogoController::class, 'create']);
Route::get('/catalogos/listar', [App\Http\Controllers\CatalogoController::class, 'getCatalogos']);
Route::get('/catalogos/show', [App\Http\Controllers\CatalogoController::class, 'show']);
Route::post('/catalogos/post', [App\Http\Controllers\CatalogoController::class, 'store']);
Route::put('/catalogos/eliminar', [App\Http\Controllers\CatalogoController::class, 'update']);
Route::get('/catalogos/{catalogo}', [App\Http\Controllers\CatalogoController::class, 'ver'] )->name('catalogo.show');

Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');



Route::get('/producto/search', [App\Http\Controllers\CatalogoController::class, 'search'] )->name('buscar.show');

Route::get('/categorias', [App\Http\Controllers\CategoriaController::class, 'index']);
Route::get('/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create']);
Route::get('/categorias/listar', [App\Http\Controllers\CategoriaController::class, 'getCategorias']);
Route::put('/categorias/eliminar', [App\Http\Controllers\CategoriaController::class, 'update']);
Route::post('/categorias/post', [App\Http\Controllers\CategoriaController::class, 'store']);
