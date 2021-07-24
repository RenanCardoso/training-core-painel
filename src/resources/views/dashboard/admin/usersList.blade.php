@extends('dashboard.base')

@section('css')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header"><h4>{{ __('Usuários') }}</h4></div>
                        <div class="card-body">
                            <div class="col-12">
                                <a
                                    href="{{ url('/users/create') }}"
                                    class="btn btn-primary mb-3" style="color:white;"
                                >
                                    Adicionar
                                </a>
                            </div>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Celular</th>
                                    <th>Tipo de Usuário</th>
                                    <th>Perfil de Acesso</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ \App\Validators\Formatter::formatterFone($user->celular) }}</td>
                                        <td>
                                            @if($user->tipousuario == 'alu')
                                                {{ 'Aluno' }}
                                            @elseif($user->tipousuario == 'ins')
                                                {{ 'Instrutor' }}
                                            @else
                                                {{ 'Administrador' }}
                                            @endif
                                        </td>
                                        <td>{{ $user->menuroles }}</td>
                                        <td>
                                            @if($user->status == 'ati')
                                                {{ 'Ativo' }}
                                            @else
                                                {{ 'Inativo' }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/users/' . $user->id) }}"
                                               class="btn btn-block btn-primary">Ver</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/users/' . $user->id . '/edit') }}"
                                               class="btn btn-block btn-primary">Editar</a>
                                        </td>
                                        <td>
                                            @if( $you->id !== $user->id )
                                                <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-block btn-danger">Deletar</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection

