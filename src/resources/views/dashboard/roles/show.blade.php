@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Detalhe do Papel de Acesso</h4></div>
            <div class="card-body">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data e Hora de Criação</th>
                            <th>Data e Hora de Atualização</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td>
                                {{ $role->created_at }}
                            </td>
                            <td>
                                {{ $role->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Voltar</a>
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
