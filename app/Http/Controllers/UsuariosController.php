<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\Usuarios;


class UsuariosController extends Controller
{
    public function index(Request $request) {

        if($request->isMethod('POST')){
            $busca = $request->busca;
//ordenação dos resultados(asc e desc)
            $ord = $request-> ord == 'asc' ? 'asc' : 'desc';
            $users = Usuario::Where('name', 'LIKE',"%{$busca}%")->orderBy('name', $ord)->paginate(15);
        } else{
              $users = Usuario::paginate();
        }


        //Busca tudo incluindo apagados
       // $prods = Produto::withTrashed()->get();

        //busca apenas os apagados
        //$prods = Produto::onlyTrashed()->get();
        return view('Usuarios.index', [
            'users' => $users,
        ]);
    }

    public function add() {
        return view('Usuarios.add');
    }

    public function addSave(Request $form) {
        $dados = $form->validate([
            'name' => 'required|min:5',
            'email' => 'required|gte:0',
            'password' => 'required|gte:0',
        ]);

        Produto::create($dados);
        return redirect()->route('usuarios');
    }

    public function edit(Usuario $usuario){
        //Usamos a mesma view do 'add'
        return view('Usuarios.a', [
            'user' => $usuario,
        ]);
    }

    public function editSave(Request $form, Usuario $usuario){
        $dados = $form->validate([
            'name' => [
                'required',
                 Rule::unique('usuarios')->ignore($usuario->id),
                'min:3',
            ],
            'email' => 'required',
            'password' => 'required',
        ]);

        $usuario->fill($dados);
        $usuario->save();

        return redirect()->route('usuarios')->with('sucesso', 'Usuario inserido com sucesso');
    }

    public function view(Usuario $usuario){
        return view('Usuarios.view', [
            'user' => $usuario,
        ]);
    }

    public function delete(Usuario $usuario){
        return view('Usuarioss.delete', [
            'user' => $usuario

        ]);
    }

    public function deleteForReal(Usuario $usuario){
        $produto->delete();
        return redirect()->route('usuarios')->with('sucesso', 'Usuario apagado com sucesso');
    }
}
