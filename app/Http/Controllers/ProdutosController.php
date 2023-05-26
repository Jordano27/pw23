<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {
        return view('Produtos.index');
    }

    public function add() {
        return view('Produtos.add');
    }

    public function addSave(Request $form) {
        dd($form);
    }

    public function view(){

    }
}
