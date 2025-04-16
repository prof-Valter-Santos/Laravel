<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        //Mostrar a lista List pela Ordem Desrescente de id
        // $user = User::orderByDesc('id')->get();

        //Mostrar a lista List pela Ordem Crescente de id
        $user = User::orderBy('id')->get();


        //Retorna a lista do user no index
        return view('user.index', ['user' => $user]);
        
    }

    public function create(){

        return view('user.create');
        
    }

    public function show(User $user){
        return view('user.show', ['user' => $user]);
    }

    public function edit(User $user){
        return view('user.edit',['user'=> $user]);
    }

    public function update(UserRequest $request, User $user){
        $request->validated();
    
    $user->update([
    'name'=> $request->name,
    'email'=> $request->email,
    'password'=> $request->password,
    ]);

    return redirect()->route('user.index')->with('sucess', 'Usuário atualizado com sucesso!');

    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('user.index')->with('sucess', 'Usuário excluido com sucesso!');
    }

    public function store(UserRequest $request){

    $request->validated();

    // Depurar valores do request
    // dd($request);
    
    //Inserir informações no BD
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    // Redirecionar para página e retornar mensagem ao cadastrar usuário
    return redirect()->route('user.index')->with('sucess', 'Usuário cadastrado com sucesso!');
    
    }
}

?>

