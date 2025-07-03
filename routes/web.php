<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LoginController;

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

Route::get('/',function(){
    return view('inicio');
})->name('inicio');

Route::resource('libros', LibroController::class);

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Route::resource('libros', LibroController::class)->only(['index', 'show', 'create', 'edit', 'destroy']);


// Route::get('/libros', function () {
//     return view('libros.listado');
// })->name('libros_listado');

// Route::get('libros/{id}', function ($id) {
//     return view('libros.ficha',compact('id'));
// })->where('id',"[0-9]+")
//   ->name('libro_ficha');

// Route::get('/libros', function () {
//     return "Listado de libros";
// })->name('libros_listado');

// Route::get('/libros/{id}', function ($id) {
//     return "Ficha del libro $id";
// })->where('id', '[0-9]+')
//   ->name('libro_ficha');

