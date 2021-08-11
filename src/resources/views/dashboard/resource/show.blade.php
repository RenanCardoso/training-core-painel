@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Detalhe de {{ $form->name }}</h4></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <table class="table">
                            <tbody>
                                @foreach($columns as $column)
                                    <tr>
                                        <td>
                                            {{ $column['name'] }}
                                        </td>
                                        <td>
                                            <?php
//                                            echo "<pre>"; print_r($columns); exit('');
                                            if( $column['type'] == 'default'){
                                                  if ($column['name'] == 'Preço'){
                                                      echo \App\Validators\Formatter::format($column['value']);
                                                  }else{
                                                      if (is_bool($column['value'])){
                                                          if ($column['value'] == true){
                                                              echo '<i class="cil-check-alt"></i>';
                                                          }
                                                      } else {
                                                          if ($column['value'] == 'nao'){
                                                              echo 'Não';
                                                          } elseif ($column['value'] == 'sim'){
                                                              echo 'Sim';
                                                          } else {
                                                              echo $column['value'];
                                                          }
                                                      }
                                                  }
                                            }elseif( $column['type'] == 'date'){
                                                echo \App\Validators\Formatter::formatterDate($column['value']);
                                            }elseif( $column['type'] == 'file'){
                                                echo '<a href="' . $column['value'] . '" class="btn btn-primary" target="_blank">Abrir arquivo</a>';
                                            }elseif( $column['type'] == 'image' ){
                                                echo '<img src="' . $column['value'] . '" style="max-width:200px;max-height:200px;">';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a
                            href="{{ route('resource.index', $form->id) }}"
                            class="btn btn-primary"
                        >
                            Voltar
                        </a>
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
