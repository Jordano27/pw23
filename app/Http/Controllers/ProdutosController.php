<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProdutosController extends Controller
{
    public function index(Request $request) {

        if($request->isMethod('POST')){
            $busca = $request->busca;
//ordenação dos resultados(asc e desc)
            $ord = $request-> ord == 'asc' ? 'asc' : 'desc';
            $prods = Produto::Where('name', 'LIKE',"%{$busca}%")->orderBy('name', $ord)->paginate(15);
        } else{
              $prods = Produto::paginate();
        }


        //Busca tudo incluindo apagados
       // $prods = Produto::withTrashed()->get();

        //busca apenas os apagados
        //$prods = Produto::onlyTrashed()->get();
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
            'price' => 'required|numeric|gte:0',
            'quantily' => 'required|integer|gte:0',
        ]);

        Produto::create($dados);
        return redirect()->route('produtos');
    }

    public function edit(Produto $produto){
        //Usamos a mesma view do 'add'
        return view('Produtos.add', [
            'prod' => $produto,
        ]);
    }

    public function editSave(Request $form, Produto $produto){
        $dados = $form->validate([
            'name' => [
                'required',
                 Rule::unique('produtos')->ignore($produto->id),
                'min:3',
            ],
            'price' => 'required|numeric|gte:0',
            'quantily' => 'required|integer|gte:0',
        ]);

        $produto->fill($dados);
        $produto->save();

        return redirect()->route('produtos')->with('sucesso', 'Produto inserido com sucesso');
    }

    public function view(Produto $produto){
        return view('Produtos.view', [
            'prod' => $produto,
        ]);
    }

    public function delete(Produto $produto){
        return view('Produtos.delete', [
            'prod' => $produto

        ]);
    }

    public function deleteForReal(Produto $produto){
        $produto->delete();
        return redirect()->route('produtos')->with('sucesso', 'Produto apagado com sucesso');
    }
}


