<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('POST')) {
            $busca = $request->busca;
            // Ordenação dos resultados (asc e desc)
            $ord = $request->ord == 'asc' ? 'asc' : 'desc';
            $users = Usuario::where('name', 'LIKE', "%{$busca}%")->orderBy('name', $ord)->paginate(15);
        } else {
            $users = Usuario::paginate(15);
        }

        return view('Usuarios.index', [
            'users' => $users,
        ]);
    }

    public function add()
    {
        return view('Usuarios.add');
    }

    public function addSave(Request $request)
    {
        $dados = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $dados['password'] = Hash::make($dados['password']);
        Usuario::create($dados);
        return redirect()->route('usuarios');
    }

    public function edit(Usuario $usuario)
    {
        return view('Usuarios.add', [
            'user' => $usuario,
        ]);
    }


    public function editSave(Request $request, Usuario $usuario)
    {
        $dados = $request->validate([
            'name' => [
                'required',
                Rule::unique('usuarios')->ignore($usuario->id),
                'min:3',
            ],
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $dados['password'] = Hash::make($dados['password']);
        $usuario->fill($dados);
        $usuario->save();

        return redirect()->route('usuarios')->with('sucesso', 'Usuário atualizado com sucesso');
    }

    public function view(Usuario $usuario)
    {
        return view('Usuarios.view', [
            'user' => $usuario,
        ]);
    }

    public function delete(Usuario $usuario)
    {
        return view('Usuarios.delete', [
            'user' => $usuario,
        ]);
    }

    public function deleteForReal(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios')->with('sucesso', 'Usuário apagado com sucesso');
    }

    public function login(Request $request){
        if ($request->isMethod('POST')){
            $data = $request->validate([
                'email'=> 'required',
                'password' => 'required',
            ]);
            if(Auth::attempt($data)){
                return redirect()->route('home');
            } else {
                return redirect()->route('login')->with('erro', 'tente Novamente');
            }
        }
        return view('usuarios.login');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home');
    }
}

