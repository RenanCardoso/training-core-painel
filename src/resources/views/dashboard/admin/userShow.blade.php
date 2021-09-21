@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            @if(Session::has('message'))
                <div class="row">
                    <div class="col-6">
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> <b>Detalhe do Usuário:</b> {{ $user->name }}</div>
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b>Nome: </b>{{ $user->name }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>RA: </b>{{ $user->ra }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Data de Nascimento: </b>
                                    {{ date( 'd/m/Y' , strtotime($user->datanasc))}}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Celular: </b>{{ \App\Validators\Formatter::formatterFone($user->celular) }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>CPF: </b>{{ \App\Validators\Formatter::formatterCPF($user->cpf) }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>RG: </b>{{ $user->rg }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Sexo: </b>{{ $user->sexo == 'mas' ? 'Masculino' : 'Feminino' }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Plano do Aluno: </b>{{ $user->plano_id }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Tipo de Usuário: </b>
                                    @if($user->tipousuario == 'alu')
                                        {{ 'Aluno' }}
                                    @elseif($user->tipousuario == 'ins')
                                        {{ 'Instrutor' }}
                                    @else
                                        {{ 'Administrador' }}
                                    @endif
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Acessa Aplicativo: </b>{{ $user->flaplicativo == 'nao' ? 'Não' : 'Sim' }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Perfil de Acesso: </b>{{ $user->menuroles }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Status: </b>{{ $user->status == 'ati' ? 'Ativo' : 'Inativo' }}
                                </div>
                            </div>

                            <a href="{{ route('users.index') }}"
                               class="btn btn-block btn-primary">{{ __('Voltar') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> <b>Endereço</b><small> Usuário</small></div>
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b>CEP: </b>
                                    {{ \App\Validators\Formatter::formatterCEP($user->cep) }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Cidade: </b>
                                    @foreach($cidades as $cidade)
                                        @if($user->idcidade == $cidade->idcidade)
                                            {{ $cidade->nmcidade }}
                                        @else
                                            {{ '' }}
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Logradouro: </b>{{ $user->logradouro }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Bairro: </b>{{ $user->bairro }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Complemento: </b>{{ $user->complemento }}
                                </div>
                                <div class="form-group col-sm-6">
                                    <b>Número: </b>{{ $user->numero }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection
