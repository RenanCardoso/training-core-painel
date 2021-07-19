<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cidade;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    /** @var UserService $userService */
    protected UserService $userService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $users = User::all();
        return view('dashboard.admin.usersList', compact('users', 'you'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.userShow', compact( 'user' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $cidades = Cidade::all();
        return view('dashboard.admin.userEditForm', compact('user', 'roles', 'cidades'));
    }

    public function create()
    {
        $roles = Role::all();
        $cidades = Cidade::all();

        return view('dashboard.admin.userCreateForm', compact('roles', 'cidades'));
    }

    /**
     * Create the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        $request->validate([
            'name'                  => 'required|min:1|max:255',
            'email'                 => 'required|email|max:255',
            'telefone'              => 'required|max:11',
            'cpf'                   => 'required|unique|max:14',
            'sexo'                  => 'max:3',
            'instrutor_option'      => 'required',
            'menuroles_option'      => 'required',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
            'cep'                   => 'required|max:10',
            'cidade_option'         => 'required',
            'logradouro'            => 'required|max:100',
            'bairro'                => 'required|max:50',
            'numero'                => 'required|max:5',
        ]);

        $userService = new UserService();
        $userService->add($request->all());
        $request->session()->flash('message', 'Usuário Criado com sucesso!');
        return redirect()->route('admin.usersList');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  => 'required|min:1|max:255',
            'email'                 => 'required|email|max:255',
            'telefone'              => 'required|max:14',
            'cpf'                   => 'required|max:11',
            'sexo'                  => 'max:3',
            'instrutor_option'      => 'required',
            'menuroles_option'      => 'required',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
            'cep'                   => 'required|max:10',
            'cidade_option'         => 'required',
            'logradouro'            => 'required|max:100',
            'bairro'                => 'required|max:50',
            'numero'                => 'required|max:5',
        ]);

        $user = User::find($id);
        $user->name       = $request->input('name');
        $user->email      = $request->input('email');
        $user->celular      = $request->input('telefone');
        $user->cpf      = $request->input('cpf');
        $user->sexo      = $request->input('sexo');
        $user->flinstrutor      = $request->input('instrutor_option');
        $user->menuroles      = $request->input('menuroles_option');
        $user->password      = $request->input('password');
        $user->cep      = $request->input('cep');
        $user->idcidade      = $request->input('cidade_option');
        $user->logradouro      = $request->input('logradouro');
        $user->bairro      = $request->input('bairro');
        $user->numero      = $request->input('numero');

        $user->save();

        $request->session()->flash('message', 'Usuário atualizado com sucesso!');
        return redirect()->route('admin.usersList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('admin.usersList');
    }
}
