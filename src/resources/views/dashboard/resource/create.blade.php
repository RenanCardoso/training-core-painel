@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Adicionar {{ $form->name }}</h4></div>
            <div class="card-body">
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
                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="{{ route('resource.store', $form->id) }}" enctype="multipart/form-data">
                            @csrf
                            @foreach($columns as $column)
                                <?php

                                $flag = false;
                                foreach($inputOptions as $option){  //check did $column is input type
                                    if($option['value'] == $column->type){
                                        $flag = true;
                                        break;
                                    }
                                }
                                if($flag == true){
                                    if($column->type == 'checkbox'){
                                        echo '<div class="form-check checkbox">';
                                        echo '<label class="form-check-label">';
                                        echo '<input class="form-check-input" type="checkbox" value="true" name="' . $column->column_name . '">';
                                        echo "$column->name</label>";
                                        echo '</div>';
                                    }elseif($column['type'] == 'price'){
                                        echo '<div class="form mb-3">';
                                        echo '<label class="form-check-label mt-3">' . $column['name'] . '</label>';
                                        echo '<input type="text" id="price" name="' . $column->column_name . '" class="form-control price" style="display:inline-block" />';
                                        echo '</div>';
                                    }elseif($column->type == 'flag'){
                                        echo '<label>' . $column->name . '</label>';
                                        echo '<select name="' . $column->column_name . '" class="form-control">';
                                        echo '<option selected="" value="">Selecione...</option>';
                                        echo '<option value="sim">Sim</option>';
                                        echo '<option value="nao">Não</option>';
                                        echo '</select>';
                                        echo '<br>';
                                    }elseif($column->type == 'codigo_treino'){
                                        echo '<label>' . $column->name . '</label>';
                                        echo '<select name="' . $column->column_name . '" class="form-control">';
                                        echo '<option selected="" value="">Selecione...</option>';
                                        echo '<option value="A">A</option>';
                                        echo '<option value="B">B</option>';
                                        echo '<option value="C">C</option>';
                                        echo '<option value="D">D</option>';
                                        echo '<option value="E">E</option>';
                                        echo '<option value="F">F</option>';
                                        echo '</select>';
                                        echo '<br>';
                                    }elseif($column->type == 'radio'){
                                        echo '<label class="mt-3">' . $column->name . '</label>';
                                        echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="radio" value="true" name="' . $column->column_name . '">';
                                        echo '<label class="form-check-label">Sim</label>';
                                        echo '</div>';
                                        echo '<div class="form-check mb-3">';
                                        echo '<input class="form-check-input" type="radio" value="false" name="' . $column->column_name . '">';
                                        echo '<label class="form-check-label">Não</label>';
                                        echo '</div>';
                                    }elseif($column->type == 'number'){
                                        echo '<label>' . $column->name . '</label>';
                                        echo '<input type="text"  class="form-control number" name="' . $column->column_name . '">';
                                        echo '<br>';
                                    }else{
                                        //column->type == 'text'
                                        echo '<label>' . $column->name . '</label>';
                                        echo '<input type="' . $column->type . '" class="form-control" name="' . $column->column_name . '">';
                                        echo '<br>';
                                    }
                                }elseif($column->type == 'relation_select'){
                                    echo '<label>' . $column->name . '</label>';
                                    echo '<select name="' . $column->column_name . '" class="form-control">';
                                    echo '<option selected="" value="">Selecione...</option>';
                                    foreach($relations['relation_' . $column->column_name] as $relation){
                                        echo '<option value="' . $relation->id . '">' . $relation->name . '</option>';
                                    }
                                    echo '<br>';
                                    echo '</select>';
                                }elseif($column->type == 'relation_radio'){
                                    echo '<label class="mt-3">' . $column->name . '</label>';
                                    foreach($relations['relation_' . $column->column_name] as $relation){
                                        echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="radio" value="' . $relation->id . '" name="' . $column->column_name . '">';
                                        echo '<label class="form-check-label">' . $relation->name . '</label>';
                                        echo '</div>';
                                    }
                                }elseif($column->type == 'file' || $column->type == 'image'){
                                    echo '<label class="btn btn-primary mt-2 ml-1">';
                                    echo $column->name . ' <input type="file" name="' . $column->column_name . '">';
                                    echo '</label>';
                                    echo '<br>';
                                }elseif($column->type == 'text_area'){
//                                    echo '<div class="form-group row">';
                                    echo '<label class="col-form-label">' . $column->name . '</label>';
                                    echo '<textarea class="form-control" name="' . $column->column_name . '" rows="9"></textarea>';
//                                    echo '</div>';
                                }elseif($column->type == 'codigo_treino'){
                                    echo '<label>' . $column->name . '</label>';
                                    echo '<select name="' . $column->column_name . '" class="form-control">';
                                    echo '<option selected="" value="">Selecione...</option>';
                                    echo '<option value="A">A</option>';
                                    echo '<option value="B">B</option>';
                                    echo '<option value="C">C</option>';
                                    echo '<option value="D">D</option>';
                                    echo '<option value="E">E</option>';
                                    echo '<option value="F">F</option>';
                                    echo '</select>';
                                    echo '<br>';
                                }else{
                                    echo '<p>Not recognize field type: ' . $column->type . '</p>';
                                }
                                ?>
                            @endforeach
                            <button
                                type="submit"
                                class="btn btn-primary mt-3"
                            >
                                Salvar
                            </button>
                            <a
                                href="{{ route('resource.index', $form->id) }}"
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
