@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Papéis de Acesso</h4></div>
            <div class="card-body">
                <div class="row">
                    <a class="btn btn-lg btn-primary" href="{{ route('roles.create') }}">Adicionar</a>
                </div>
                <br>
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Hierarquia</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    {{ $role->hierarchy }}
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('roles.up', ['id' => $role->id]) }}">
                                        <i class="cil-arrow-thick-top"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('roles.down', ['id' => $role->id]) }}">
                                        <i class="cil-arrow-thick-bottom"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('roles.show', $role->id ) }}" class="btn btn-primary">Ver Detalhe</a>
                                </td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id ) }}" class="btn btn-primary">Editar</a>
                                </td>
                                <td>
                                <form action="{{ route('roles.destroy', $role->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Remover</button>
                                </form>
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
</div>

@endsection

@section('javascript')

@endsection
