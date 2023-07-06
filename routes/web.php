<?php

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

Route::get('/Produtos', [ProdutosController::class, 'index'])->name('produtos')->middleware('auth');

Route::post('/Produtos', [ProdutosController::class, 'index']);

Route::get('/produtos/add', [ProdutosController::class, 'add'])->name('produtos.add');

Route::post('/produtos/add', [ProdutosController::class, 'addsave'])->name('produtos.addsave');

Route::get('/produtos/{produto}', [ProdutosController::class, 'view'])->name('produtos.view');

Route::get('/produtos/edit/{produto}', [ProdutosController::class, 'edit'])->name('produtos.edit');

Route::post('/produtos/edit/{produto}', [ProdutosController::class, 'editSave'])->name('produtos.editSave');

Route::get('/produtos/delete/{produto}', [ProdutosController::class, 'delete'])->name('produtos.delete');

Route::delete('/produtos/delete/{produto}', [ProdutosController::class, 'deleteForReal'])->name('produtos.deleteForReal');

Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios');

Route::post('/usuarios', [UsuariosController::class, 'index']);

Route::get('/usuarios/add', [UsuariosController::class, 'add'])->name('usuarios.add');

Route::post('/usuarios/add', [UsuariosController::class, 'addsave'])->name('usuarios.addsave');

Route::get('/usuarios/{usuario}', [UsuariosController::class, 'view'])->name('usuarios.view');

Route::get('/usuarios/edit/{usuario}', [UsuariosController::class, 'edit'])->name('usuarios.edit');

Route::post('/usuarios/edit/{usuario}', [UsuariosController::class, 'editSave'])->name('usuarios.editSave');

Route::get('/usuarios/delete/{usuario}', [UsuariosController::class, 'delete'])->name('usuarios.delete');

Route::delete('/usuarios/delete/{usuario}', [UsuariosController::class, 'deleteForReal'])->name('usuarios.deleteForReal');

Route::get('login', [UsuariosController::class, 'login'])->name('login');

Route::post('login', [UsuariosController::class, 'login'])->name('login');

Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');

Route::get('/email/verify', function(){
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
   $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

/*
Route::get('/teste/{algo?}' = caminho da rota, coma varialvel, nesse caso a variavel é {algo?};

, function($algo = null){
    return "Tua mãe é minha - {$algo} 😁";
});
 a ? deixa ter ou nao algo,  deixa opcional;
 Route::get('/teste-view/{param?}', function($param = null){
    return view('teste-view', [

        'valor_da_controller' => $param,
    ]);
*/


