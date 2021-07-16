<?php


namespace App\Services;


use App\Validators\Formatter;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function add($request){

        $user = new User();
        $user->name             = $request['name'];
        $user->datanasc         = $request['datanasc'];
        $user->email            = $request['email'];
        $user->telefone         = Formatter::formatToDatabase($request['telefone']);
        $user->cpf              = Formatter::formatToDatabase($request['cpf']);
        $user->rg               = Formatter::formatToDatabase($request['rg']);
        $user->sexo_option      = $request['sexo_option'];
        $user->instrutor_option = $request['instrutor_option'];
        $user->sexo_option      = $request['sexo_option'];
        $user->menuroles_option = $request['menuroles_option'];
        $user->cidade           = $request['cidade'];
        $user->cep              = $request['cep'];
        $user->bairro           = $request['bairro'];
        $user->complemento      = $request['complemento'];
        $user->numero           = $request['numero'];
        $user->flinstrutor      = $request['flinstrutor'];
        $user->password         = Hash::make($request['password']);

        echo "<pre>"; print_r($user); exit('objeto');
        $user->save();
    }
}
