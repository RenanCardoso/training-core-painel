@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Deletar {{ $formName }}</h4></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="{{ route('resource.destroy', ['table' => $table, 'resource' => $id ]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="marker" value="true">
                            <p>Você tem certeza?</p>
                            <button
                                type="submit"
                                class="btn btn-danger mt-3"
                            >
                                Deletar
                            </button>
                            <a
                                href="{{ route('resource.index', $table) }}"
                                class="btn btn-primary mt-3"
                            >
                                Voltar
                            </a>
                        </form>
                    </div>
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
