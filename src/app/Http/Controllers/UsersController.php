<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Validators\Formatter;
use App\Models\User;
use App\Models\Cidade;
use App\Models\Plano;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

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
        $cidades = Cidade::all();
        $planos = Plano::all();

        return view('dashboard.admin.userShow', compact( 'user', 'cidades', 'planos' ));
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
        $planos = Plano::all();

        return view('dashboard.admin.userEditForm', compact('user', 'roles', 'cidades', 'planos'));
    }

    public function create()
    {
        $roles = Role::all();
        $cidades = Cidade::all();
        $planos = Plano::all();

        return view('dashboard.admin.userCreateForm', compact('roles', 'cidades', 'planos'));
    }

    /**
     * Create the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $this->add($request, $user);
        $request->session()->flash('message', 'Usuário Criado com sucesso!');
        return redirect()->route('users.index');
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
        $user = User::find($id);
        $this->updateUser($request, $user);
        $request->session()->flash('message', 'Usuário atualizado com sucesso!');
        return redirect()->route('users.index');
    }

    public function add(Request $request, $user){

        $request->validate([
            'name'                  => 'required|min:1|max:255',
            'ra'                    => 'required',
            'email'                 => 'required|email|max:255',
            'telefone'              => 'required|max:14',
            'cpf'                   => 'required|max:14',
            'sexo'                  => 'max:3',
            'planos_option'         => 'required',
            'tipousuario_option'    => 'required',
            'flaplicativo_option'   => 'required',
            'menuroles_option'      => 'required',
            'password_confirmation' => 'same:password',
            'cep'                   => 'required|max:10',
            // 'cidade_option'         => 'required',
            'logradouro'            => 'required|max:100',
            'bairro'                => 'required|max:50',
            'numero'                => 'required|max:5',
        ]);

        if ($request['flaplicativo_option'] == 'sim'){
            $request->validate([
                'password'              => 'required',
                'password_confirmation' => 'required',
            ]);
        }

        $user->name             = $request['name'];
        $user->ra               = $request['ra'];
        $user->datanasc         = $request['datanasc'];
        $user->email            = $request['email'];
        $user->celular          = Formatter::formatToDatabase($request['telefone']);
        $user->cpf              = Formatter::formatToDatabase($request['cpf']);
        $user->rg               = Formatter::formatToDatabase($request['rg']);
        $user->sexo             = $request['sexo_option'];
        $user->plano_id         = $request['planos_option'];
        $user->tipousuario      = $request['tipousuario_option'];
        $user->idcidade         = $request['cidade_option'];
        $user->flaplicativo     = $request['flaplicativo_option'];

        //lógica para pegar o role selecionado e gravar corretamente no BD
        $user->menuroles        = $request['menuroles_option'];
        $menuroles_array        = \DB::table("roles")->where('id', $user->menuroles)->first(['name']);
        $menuroles_array        = json_decode(json_encode($menuroles_array), true);
        $user->menuroles        = $menuroles_array['name'];

        $user->cep = Formatter::formatToDatabase($request['cep']);
        $user->logradouro       = $request['logradouro'];
        $user->bairro           = $request['bairro'];
        $user->complemento      = $request['complemento'];
        $user->numero           = $request['numero'];
        $user->status           = 'ati';

        $user->password = Hash::make($request['password']);

    //    echo "<pre>"; print_r($user->idcidade); exit('objeto');

        $user->save();
        $email = new MailController();
        $email->send(2, $request);
    }

    public function updateUser(Request $request, $user){

        $request->validate([
            'name'                  => 'required|min:1|max:255',
            'ra'                    => 'required',
            'email'                 => 'required|email|max:255',
            'telefone'              => 'required|max:14',
            'cpf'                   => 'required|max:14',
            'sexo'                  => 'max:3',
            'planos_option'         => 'required',
            'tipousuario_option'    => 'required',
            'flaplicativo_option'   => 'required',
            'menuroles_option'      => 'required',
            'password_confirmation' => 'same:password',
            'cep'                   => 'required|max:10',
            // 'cidade_option'         => 'required',
            'logradouro'            => 'required|max:100',
            'bairro'                => 'required|max:50',
            'numero'                => 'required|max:5',
        ]);

        $user->name             = $request['name'];
        $user->ra               = $request['ra'];
        $user->datanasc         = $request['datanasc'];
        $user->email            = $request['email'];
        $user->celular          = Formatter::formatToDatabase($request['telefone']);
        $user->cpf              = Formatter::formatToDatabase($request['cpf']);
        $user->rg               = Formatter::formatToDatabase($request['rg']);
        $user->sexo             = $request['sexo_option'];
        $user->plano_id         = $request['planos_option'];
        $user->tipousuario      = $request['tipousuario_option'];
        $user->idcidade         = $request['cidade_option'];
        $user->flaplicativo     = $request['flaplicativo_option'];

        //lógica para pegar o role selecionado e gravar corretamente no BD
        $user->menuroles        = $request['menuroles_option'];
        $menuroles_array        = \DB::table("roles")->where('id', $user->menuroles)->first(['name']);
        $menuroles_array        = json_decode(json_encode($menuroles_array), true);
        $user->menuroles        = $menuroles_array['name'];

        $user->cep = Formatter::formatToDatabase($request['cep']);
        $user->logradouro       = $request['logradouro'];
        $user->bairro           = $request['bairro'];
        $user->complemento      = $request['complemento'];
        $user->numero           = $request['numero'];

        $senha_alterada = false;

        if (!empty($request['password'])){
            $user->password = Hash::make($request['password']);
            $senha_alterada = true;
        }

    //    echo "<pre>"; print_r($user->idcidade); exit('objeto');

        $user->save();
        $email = new MailController();

        if($senha_alterada && $user->flaplicativo == 'sim'){
            $email->send(2, $request);
        }
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

        if(!$user){
            abort(404);
        }
        $user->status = 'ina';
        $user->save();
        $user->delete();

        return redirect()->route('users.index');
    }
}
