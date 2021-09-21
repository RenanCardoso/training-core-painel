@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            @if(Session::has('message'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('users.store') }}">
            @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header"><strong>Dados Pessoais</strong> <small>Usuários</small>
                                <br> <small>Campos com asterísco * são obrigatórios.</small>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nome</label><small><b> *</b></small>
                                        <input class="form-control" type="text" placeholder="{{ __('Nome') }}"
                                               maxlength="255" name="name" id="name" required autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ra">RA</label><small><b> *</b></small>
                                        <input class="form-control" type="number" placeholder="{{ __('RA') }}"
                                               maxlength="255" name="ra" id="ra" required autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="datanasc">Data de Nascimento</label>
                                        <input type="date" class="form-control" name="datanasc" id="datanasc">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail</label><small><b> *</b></small>
                                        <input class="form-control" type="text" name="email" id="email"
                                               maxlength="255" placeholder="email@email.com" required autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="telefone">Celular</label><small><b> *</b></small>
                                        <input type="tel" class="form-control telefone" name="telefone" id="telefone"
                                               placeholder="00 00000-0000" required autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cpf">CPF</label><small><b> *</b></small>
                                        <input type="text" class="form-control cpf" name="cpf" id="cpf"
                                               placeholder="000.000.000-00" required autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="rg">RG</label>
                                        <input type="text" class="form-control" name="rg" id="rg" maxlength="15">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="sexo_option" for="sexo">Sexo</label>
                                        <select class="form-control" name="sexo_option" id="sexo_option">
                                            <option selected="" value="">Selecione...</option>
                                            <option value="mas">Masculino</option>
                                            <option value="fem">Feminino</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="planos_option">Plano do Aluno</label><small><b> *</b></small>
                                        <select class="form-control" name="planos_option" id="planos_option"
                                                required autofocus>
                                            <option selected="" value="">Selecione...</option>
                                            @foreach($planos as $plano)
                                                <option value="{{ $plano->id }}">{{ $plano->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tipousuario_option" for="tipousuario_option">Tipo de Usuário</label><small><b> *</b></small>
                                        <select class="form-control" name="tipousuario_option" id="tipousuario_option"
                                                required autofocus>
                                            <option selected="" value="">Selecione...</option>
                                            <option value="alu">Aluno</option>
                                            <option value="ins">Instrutor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="flaplicativo_option">Acessa Aplicativo?</label><small><b> *</b></small>
                                        <select class="form-control" name="flaplicativo_option" id="flaplicativo_option"
                                                required autofocus>
                                            <option selected="" value="">Selecione...</option>
                                            <option value="sim">Sim</option>
                                            <option value="nao">Não</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="menuroles_option">Perfil de Acesso</label><small><b> *</b></small>
                                        <select class="form-control" name="menuroles_option" id="menuroles_option"
                                                required autofocus>
                                            <option selected="" value="">Selecione...</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Senha</label></small>
                                        <input type="password" class="form-control" name="password" id="password"
                                               maxlength="255">
                                        <span class="help-block">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation">Confirmar Senha</label></small>
                                        <input type="password" class="form-control" name="password_confirmation"
                                               maxlength="255" id="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <small>*Senha e confirmar senha são obrigatórios somente quando o usuário tem acesso ao aplicativo. Caso ele tenha, a senha deverá ser o seu primeiro nome com a letra inicial em maiúscula junto com seu RA.</small></span>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Salvar') }}</button>
                                <a href="{{ route('users.index') }}"
                                   class="btn btn-block btn-primary">{{ __('Voltar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header"><strong>Endereço</strong> <small>Usuário</small></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="cep">CEP</label><small><b> *</b></small>
                                        <input type="text" class="form-control cep" name="cep" id="cep"
                                               placeholder="00000-000" required autofocus>
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <label for="cidade_option">Cidade</label><small><b> *</b></small>
                                        <select class="form-control" name="cidade_option" id="cidade_option" required autofocus>
                                            <option selected="" value="">Selecione...</option>
                                            @foreach($cidades as $cidade)
                                                <option value="{{ $cidade->idcidade }}">{{ $cidade->nmcidade }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="logradouro">Logradouro</label><small><b> *</b></small>
                                    <input type="text" class="form-control" name="logradouro" id="logradouro" maxlength="100" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="bairro">Bairro</label><small><b> *</b></small>
                                    <input type="text" class="form-control" name="bairro" id="bairro" maxlength="50" required autofocus>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-8">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control" name="complemento" id="complemento" maxlength="50">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="numero">Número</label><small><b> *</b></small>
                                        <input type="text" class="form-control" name="numero" id="numero" maxlength="5" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('javascript')

@endsection
