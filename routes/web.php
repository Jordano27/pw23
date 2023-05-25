<?php

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

Route::get('/teste/{algo?}', function($algo = null){
    return "Tua mãe é minha - {$algo} 😁";
});

Route::get('/teste-view/{param?}', function($param = null){
    return view('teste-view', [
      
        'valor_da_controller' => $param,
    ]);
});
