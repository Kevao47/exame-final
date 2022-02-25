<?php

use App\Http\Controllers\DiscussaoController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');


    Route::get('/', [DiscussaoController::class, 'home'])->name('home'); // Listagem


    Route::get('/discussao/{id}', [DiscussaoController::class, 'show'])->name('show-discussao'); // Show
    Route::post('/comentar/{id}', [DiscussaoController::class, 'comentar'])->name('comentar'); // Comentar

    
    Route::get('/publicar', [DiscussaoController::class, 'create'])->name('publicar'); // Publicar view
    Route::post('/publicar', [DiscussaoController::class, 'store']); // publicar


});

Route::view('/cadastro', 'criar-conta')->name('criar-conta'); // Criar conta view
Route::post('/cadastro', [UsuariosController::class, 'insert']); // criar conta

Route::view('/login', 'login')->name('login'); // Login view
Route::post('/login', [UsuariosController::class, 'login'])->name('login'); // Login


// Route::get('produtos', [ProdutosController::class, 'index'])->name('produtos');

// Route::get('/produtos/inserir', [ProdutosController::class, 'create'])->name('produtos.inserir');

// Route::post('/produtos/inserir', [ProdutosController::class, 'insert'])->name('produtos.gravar');

// Route::get('/produtos/{prod}', [ProdutosController::class, 'show'])->name('produtos.show');

// Route::get('/produtos/{prod}/editar', [ProdutosController::class, 'edit'])->name('produtos.edit');

// Route::put('/produtos/{prod}/editar', [ProdutosController::class, 'update'])->name('produtos.update');

// Route::get('/produtos/{prod}/apagar', [ProdutosController::class, 'remove'])->name('produtos.remove');

// Route::delete('/produtos/{prod}/apagar', [ProdutosController::class, 'delete'])->name('produtos.delete');

// Route::get('usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');

// Route::prefix('usuarios')->group(function() {
    
//     Route::get('/inserir', [UsuariosController::class, 'create'])->name('usuarios.inserir');
//     Route::post('/inserir', [UsuariosController::class, 'insert'])->name('usuarios.gravar');

// });

// Route::get('/login', [UsuariosController::class, 'login'])->name('login');
// Route::post('/login', [UsuariosController::class, 'login']);

// Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');
