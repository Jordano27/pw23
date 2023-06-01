<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {
        $prods = Produto::all();


        return view('Produtos.index', [
            'prods' => $prods,
        ]);
    }

    public function add() {
        return view('Produtos.add');
    }

    public function addSave(Request $form) {
        $dados = $form->validate([
            'name' => 'required|unique:produtos|min:3',
            'price' => 'required|numeric|min:0',
            'quantily' => 'required|integer|min:0',
        ]);

        Produto::create($dados);
        return redirect()->route('produtos');
    }

    public function view(){

    }
}
