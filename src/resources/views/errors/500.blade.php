@extends('dashboard.errorBase')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="clearfix">
                    <h1 class="float-left display-3 mr-4">500</h1>
                    <h4 class="pt-3">Houston, nós temos um problema!</h4>
                    <p class="text-muted">A página que você está procurando está temporariamente indisponível.</p>
                </div>
                <div class="input-prepend input-group">
                    <div class="input-group-prepend"><span class="input-group-text">
                <svg class="c-icon">
                  <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-magnifying-glass"></use>
                </svg></span></div>
                    <input class="form-control" id="prependedInput" size="16" type="text" placeholder="O que você está procurando?"><span class="input-group-append">
              <button class="btn btn-info" type="button">Buscar</button></span>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection
