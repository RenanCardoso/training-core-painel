@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header"><strong>Dados Pessoais</strong> <small>Usuários</small></div>
                        <div class="card-body">
                            <br>
                            <form method="POST" action="{{ route('admin.userStore') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nome</label>
                                        <input class="form-control" type="text" placeholder="{{ __('Nome') }}" name="name" id="name" required autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="datanasc">Data de Nascimento</label>
                                        <input type="date" class="form-control" name="datanasc" id="datanasc">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail</label>
                                        <input class="form-control" type="text" placeholder="{{ __('E-mail') }}" name="email" id="email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="telefone">Celular</label>
                                        <input type="tel" class="form-control telefone" name="telefone" id="telefone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control cpf" name="cpf" id="cpf">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="rg">RG</label>
                                        <input type="text" class="form-control" name="rg" id="rg">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="sexo_option" for="sexo">Sexo</label>
                                        <select class="form-control" name="sexo_option" id="sexo_option">
                                            <option selected="" value="">Selecione...</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Feminino</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="instrutor_option" for="instrutor_option">Instrutor?</label>
                                        <select class="form-control" name="instrutor_option" id="instrutor_option">
                                            <option selected="" value="">Selecione...</option>
                                            <option value="sim">Sim</option>
                                            <option value="nao">Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="sexo_option" for="sexo">Sexo</label>
                                        <select class="form-control" name="sexo_option" id="sexo_option">
                                            <option selected="" value="">Selecione...</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Feminino</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="menuroles_option">Papel de Acesso</label>
                                        <select class="form-control" name="menuroles_option" id="menuroles_option">
                                            <option selected="" value="">Selecione...</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ $role->name }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Senha</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation">Confirmar Senha</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Salvar') }}</button>
                                <a href="{{ route('admin.usersList') }}" class="btn btn-block btn-primary">{{ __('Voltar') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header"><strong>Endereço</strong> <small>Usuário</small></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="cep">
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="cidade">Cidade</label>
                                    <input class="form-control" id="cidade" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control" name="logradouro" id="logradouro">
                            </div>
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" name="bairro" id="bairro">
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="numero">Número</label>
                                    <input type="text" class="form-control" name="numero" id="numero">
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
