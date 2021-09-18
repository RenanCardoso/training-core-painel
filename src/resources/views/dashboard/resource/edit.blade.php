@extends('dashboard.base')

@section('css')

@endsection

@section('content')

@section('scripts')
<link rel="stylesheet" href="{!! asset('css/animate.css') !!}">
@endsection

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar {{ $form->name }}</h4>
                    </div>
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
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('resource.update', ['table' => $form->id, 'resource' => $id ] ) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @foreach($columns as $column)

                                    <div class="row">
                                        <div class="form-groupgroup col-md-6">
                                            <?php
                                            $flag = false;
                                            foreach ($inputOptions as $option) {  //check did $column is input type
                                                if ($option['value'] == $column['type']) {
                                                    $flag = true;
                                                    break;
                                                }
                                            }
                                            if ($flag == true) {
                                                if ($column['type'] == 'checkbox') {
                                                    echo '<div class="form-check checkbox">';
                                                    echo '<input class="form-check-input" type="checkbox" value="true" name="' . $column['column_name'] . '"';
                                                    if ($column['value'] == 'true') {
                                                        echo ' checked ';
                                                    }
                                                    echo '>';
                                                    echo '<label class="form-check-label">' . $column['name'] . '</label>';
                                                    echo '</div>';
                                                } elseif ($column['type'] == 'price') {
                                                    echo '<label class="form-check-label mt-3">' . $column['name'] . '</label>';
                                                    echo '<div class="form mb-3">';
                                                    echo '<input type="text" id="price" name="' . $column['column_name'] . '" class="form-control price" style="display:inline-block" value="' . $column['value'] . '"/>';
                                                    echo '</div>';
                                                } elseif ($column['type'] == 'flag') {
                                                    echo '<label>' . $column['name'] . '</label>';
                                                    echo '<select name="' . $column['column_name'] . '" class="form-control">';
                                                    if ($column['value'] == 'sim') {
                                                        echo '<option selected value="sim">Sim</option>';
                                                        echo '<option value="nao">Não</option>';
                                                    } else {
                                                        echo '<option value="sim">Sim</option>';
                                                        echo '<option selected value="nao">Não</option>';
                                                    }
                                                    echo '</select>';
                                                    echo '<br>';
                                                } elseif ($column['type'] == 'radio') {
                                                    echo '<label class="mt-3">' . $column['name'] . '</label>';
                                                    echo '<div class="form-check">';
                                                    echo '<input class="form-check-input" type="radio" value="true" name="' . $column['column_name'] . '"';
                                                    if ($column['value'] == 'true') {
                                                        echo ' checked ';
                                                    }
                                                    echo '>';
                                                    echo '<label class="form-check-label">yes</label>';
                                                    echo '</div>';
                                                    echo '<div class="form-check mb-3">';
                                                    echo '<input class="form-check-input" type="radio" value="false" name="' . $column['column_name'] . '"';
                                                    if ($column['value'] == 'false') {
                                                        echo ' checked ';
                                                    }
                                                    echo '>';
                                                    echo '<label class="form-check-label">no</label>';
                                                    echo '</div>';
                                                } elseif ($column['type'] == 'number') {
                                                    echo '<label>' . $column['name'] . '</label>';
                                                    echo '<input type="text" id="number" class="form-control number" name="' . $column['column_name'] . '" value="' . $column['value'] . '">';
                                                    echo '<br>';
                                                } elseif ($column['type'] == 'imc') {
                                                    echo '<label>' . $column['name'] . '</label>';
                                                    echo '<input type="text" id="imc" class="form-control imc" name="' . $column['column_name'] . '" value="">';
                                                } else {
                                                    echo '<label>' . $column['name'] . '</label>';
                                                    echo '<input type="' . $column['type'] . '" class="form-control" name="' . $column['column_name'] . '" value="' . $column['value'] . '">';
                                                    echo '<br>';
                                                }
                                            } elseif ($column['type'] == 'relation_select') {
                                                echo '<label>' . $column['name'] . '</label>';
                                                echo '<select name="' . $column['column_name'] . '" class="form-control">';
                                                echo '<option value="">Selecione...</option>';
                                                foreach ($relations['relation_' . $column['column_name']] as $relation) {
                                                    if ($relation->id == $column['value']) {
                                                        echo '<option selected value="' . $relation->id . '">' . $relation->name . '</option>';
                                                    } else {
                                                        echo '<option value="' . $relation->id . '">' . $relation->name . '</option>';
                                                    }
                                                }
                                                echo '</select>';
                                                echo '<br>';
                                            } elseif ($column['type'] == 'relation_radio') {
                                                echo '<label class="mt-3">' . $column['name'] . '</label>';
                                                foreach ($relations['relation_' . $column['column_name']] as $relation) {
                                                    echo '<div class="form-check">';
                                                    if ($relation->id == $column['value']) {
                                                        echo '<input checked class="form-check-input" type="radio" value="' . $relation->id . '" name="' . $column['column_name'] . '">';
                                                    } else {
                                                        echo '<input class="form-check-input" type="radio" value="' . $relation->id . '" name="' . $column['column_name'] . '">';
                                                    }
                                                    echo '<label class="form-check-label">' . $relation->name . '</label>';
                                                    echo '</div>';
                                                }
                                            } elseif ($column['type'] == 'file' || $column['type'] == 'image') {
                                                if ($column['type'] == 'image') {
                                                    echo '<img src="' . $column['value'] . '" style="max-width:200px;max-height:200px;">';
                                                }
                                                echo '<label class="btn btn-primary mt-2 ml-1">';
                                                echo $column['name'] . ' <input type="file" name="' . $column['column_name'] . '">';
                                                echo '</label>';
                                                echo '<br>';
                                            } elseif ($column['type'] == 'text_area') {
                                                //                                                    echo '<div class="form-group row">';
                                                echo '<label class="col-form-label">' . $column['name'] . '</label>';
                                                echo '<textarea class="form-control" name="' . $column['column_name'] . '" rows="9">' . $column['value'] . '</textarea>';
                                                //                                                    echo '</div>';
                                            } elseif ($column['type'] == 'codigo_treino') {
                                                echo '<label>' . $column['name'] . '</label>';
                                                echo '<select name="' . $column['column_name'] . '" class="form-control">';
                                                if ($column['value'] == 'A') {
                                                    echo '<option selected value="A">A</option>';
                                                    echo '<option value="B">B</option>';
                                                    echo '<option value="C">C</option>';
                                                    echo '<option value="D">D</option>';
                                                    echo '<option value="E">E</option>';
                                                    echo '<option value="F">F</option>';
                                                } elseif ($column['value'] == 'B') {
                                                    echo '<option value="A">A</option>';
                                                    echo '<option selected value="B">B</option>';
                                                    echo '<option value="C">C</option>';
                                                    echo '<option value="D">D</option>';
                                                    echo '<option value="E">E</option>';
                                                    echo '<option value="F">F</option>';
                                                } elseif ($column['value'] == 'C') {
                                                    echo '<option value="A">A</option>';
                                                    echo '<option value="B">B</option>';
                                                    echo '<option selected value="C">C</option>';
                                                    echo '<option value="D">D</option>';
                                                    echo '<option value="E">E</option>';
                                                    echo '<option value="F">F</option>';
                                                } elseif ($column['value'] == 'D') {
                                                    echo '<option value="A">A</option>';
                                                    echo '<option value="B">B</option>';
                                                    echo '<option value="C">C</option>';
                                                    echo '<option selected value="D">D</option>';
                                                    echo '<option value="E">E</option>';
                                                    echo '<option value="F">F</option>';
                                                } elseif ($column['value'] == 'E') {
                                                    echo '<option value="A">A</option>';
                                                    echo '<option value="B">B</option>';
                                                    echo '<option value="C">C</option>';
                                                    echo '<option value="D">D</option>';
                                                    echo '<option selected value="E">E</option>';
                                                    echo '<option value="F">F</option>';
                                                } elseif ($column['value'] == 'F') {
                                                    echo '<option value="A">A</option>';
                                                    echo '<option value="B">B</option>';
                                                    echo '<option value="C">C</option>';
                                                    echo '<option value="D">D</option>';
                                                    echo '<option value="E">E</option>';
                                                    echo '<option selected value="F">F</option>';
                                                }
                                                echo '</select>';
                                                echo '<br>';                                                
                                            } else {
                                                echo '<p>Not recognize field type: ' . $column['type'] . '</p>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary mt-3">
                                        Salvar
                                    </button>
                                    <a href="{{ route('resource.index', $form->id) }}" class="btn btn-primary mt-3">
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