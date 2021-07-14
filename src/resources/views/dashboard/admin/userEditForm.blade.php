@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Editar') }} {{ $user->name }}</div>
                        <div class="card-body">
                            <br>
                            <form method="POST" action="/users/{{ $user->id }}">
                                @csrf
                                @method('PUT')
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <svg class="c-icon c-icon-sm">
                                          <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                                      </svg>
                                    </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('Nome') }}" name="name"
                                           value="{{ $user->name }}" required autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('E-mail') }}"
                                           name="email" value="{{ $user->email }}" required>
                                </div>

                                {{--                                Novos campos--}}
                                <label>Senha</label>
                                <input type="password" class="form-control" name="password">
                                <label>Data de Nascimento</label>
                                <input type="date" class="form-control" name="datanasc">
                                <label for="sexo">Sexo</label>
                                <select class="form-control" name="idsexo" id="idsexo">
                                    <option selected="" value="">Selecione...</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Feminino</option>
                                </select>
                                <label>CPF</label>
                                <input type="text" class="form-control cpf" name="cpf">
                                <label>RG</label>
                                <input type="text" class="form-control" name="rg">
                                <label>Celular</label>
                                <input type="tel" class="form-control telefone" name="celular">
                                <label>Logradouro</label>
                                <input type="text" class="form-control" name="logradouro">
                                <label>Número</label>
                                <input type="text" class="form-control" name="numero">
                                <label>Complemento</label>
                                <input type="text" class="form-control" name="complemento">
                                <label>Bairro</label>
                                <input type="text" class="form-control" name="bairro">
                                <label>Cep</label>
                                <input type="text" class="form-control" name="cep">
                                <label>Instrutor?</label>
                                <input type="text" class="form-control" name="flinstrutor">

                                <input type="instrutor" class="form-control" name="datanasc">
                                <label for="sexo">Sexo</label>
                                <select class="form-control" name="sexolist" id="sexo">
                                    <option selected="" value="">Selecione...</option>
                                    <option value="mas">Masculino</option>
                                    <option value="fem">Feminino</option>
                                </select>

                                <label>Papel de Acesso</label>
                                <input type="text" class="form-control" name="menuroles">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="name">

                                <button class="btn btn-block btn-success" type="submit">{{ __('Salvar') }}</button>
                                <a href="{{ route('admin.usersList') }}"
                                   class="btn btn-block btn-primary">{{ __('Voltar') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection
