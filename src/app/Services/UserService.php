<?php


namespace App\Services;


use App\Validators\Formatter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function add($request, $user){

        if (isset($user) && $user != null){
            $user = new User();
            $user->name               = $request['name'];
            $user->datanasc           = $request['datanasc'];
            $user->email              = $request['email'];
            $user->celular            = Formatter::formatToDatabase($request['telefone']);
            $user->cpf                = Formatter::formatToDatabase($request['cpf']);
            $user->rg                 = Formatter::formatToDatabase($request['rg']);
            $user->sexo               = $request['sexo_option'];
            $user->flinstrutor        = $request['instrutor_option'];
            $user->idcidade           = $request['cidade_option'];

            //lógica para pegar o role selecionado e gravar corretamente no BD
            $user->menuroles          = $request['menuroles_option'];
            $menuroles_array          = \DB::table("roles")->where('id', $user->menuroles)->first(['name']);
            $menuroles_array          = json_decode(json_encode($menuroles_array), true);
            $user->menuroles          = $menuroles_array['name'];

            $user->cep                = Formatter::formatToDatabase($request['cep']);
//        $user->bairro           = $request['bairro'];
//        $user->complemento      = $request['complemento'];
//        $user->numero           = $request['numero'];
//        $user->flinstrutor      = $request['flinstrutor'];

            $user->password         = Hash::make($request['password']);

//        echo "<pre>"; print_r($user->cidade); exit('objeto');
            $user->save();
        } else {
            $user = new User();
            $user->name               = $request['name'];
            $user->datanasc           = $request['datanasc'];
            $user->email              = $request['email'];
            $user->celular            = Formatter::formatToDatabase($request['telefone']);
            $user->cpf                = Formatter::formatToDatabase($request['cpf']);
            $user->rg                 = Formatter::formatToDatabase($request['rg']);
            $user->sexo               = $request['sexo_option'];
            $user->flinstrutor        = $request['instrutor_option'];
            $user->idcidade           = $request['cidade_option'];

            //lógica para pegar o role selecionado e gravar corretamente no BD
            $user->menuroles          = $request['menuroles_option'];
            $menuroles_array          = \DB::table("roles")->where('id', $user->menuroles)->first(['name']);
            $menuroles_array          = json_decode(json_encode($menuroles_array), true);
            $user->menuroles          = $menuroles_array['name'];

            $user->cep                = Formatter::formatToDatabase($request['cep']);
//        $user->bairro           = $request['bairro'];
//        $user->complemento      = $request['complemento'];
//        $user->numero           = $request['numero'];
//        $user->flinstrutor      = $request['flinstrutor'];

            $user->password         = Hash::make($request['password']);

//        echo "<pre>"; print_r($user->cidade); exit('objeto');
            $user->save();
        }
    }
}
