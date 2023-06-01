<?php

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
});

Route::get('/Produtos', [ProdutosController::class, 'index'])->name('produtos');

Route::get('/produtos/add', [ProdutosController::class, 'add'])->name('produtos.add');

Route::post('/produtos/add', [ProdutosController::class, 'addsave'])->name('produtos.addsave');

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
