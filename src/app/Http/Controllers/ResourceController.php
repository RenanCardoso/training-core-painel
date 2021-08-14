<?php

namespace App\Http\Controllers;

use App\Models\FichaDeTreino;
use App\Models\TreinoRealizado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Models;
use Illuminate\Support\Facades\DB;
use App\Services\ResourceService;
use App\Services\FormService;
use App\Models\Form;
use App\Models\FormField;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($table, Request $request)
    {
        $role = Role::where('name', '=', 'admin')->first();
        try {
            if($role->hasPermissionTo('browse bread ' . $table)){
                $alunoHasPermission = true;
            }
        } catch (\Throwable $e) {
            $alunoHasPermission = false;
        }
        if(!$alunoHasPermission){
            if(empty(Auth::user())){
                abort('401');
            }else{
                if(!Auth::user()->can('browse bread ' . $table)){
                    abort('401');
                }
            }
        }
        $form = Form::find( $table );
        $resourceService = new ResourceService();
        $data = $resourceService->getIndexDatas( $table );
        return view('dashboard.resource.index', [
            'form' => $form,
            'header' => $resourceService->getFullIndexHeader( $table ),
            'datas' => $data['data'],
            'pagination' => $data['pagination'],
            'enableButtons' => $data['enableButtons']
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($table, Request $request)
    {
        $role = Role::where('name', '=', 'admin')->first();
        try {
            if($role->hasPermissionTo('add bread ' . $table)){
                $alunoHasPermission = true;
            }
        } catch (\Throwable $e) {
            $alunoHasPermission = false;
        }
        if(!$alunoHasPermission){
            if(empty(Auth::user())){
                abort('401');
            }else{
                if(!Auth::user()->can('add bread ' . $table)){
                    abort('401');
                }
            }
        }
        $form = Form::find( $table );
        if($form->add == 1){
            $resourceService = new ResourceService();
            $formService = new FormService();
            $columns = $resourceService->getColumnsForAdd( $table );

            return view('dashboard.resource.create', [
                'form' => $form,
                'columns' => $columns,
                'relations' => $resourceService->getRelations( $columns ),
                'inputOptions' => $formService->getFromOptionsStandardInput(),
            ]);
        }else{
            abort('401');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($table, Request $request)
    {
        $role = Role::where('name', '=', 'admin')->first();
        try {
            if($role->hasPermissionTo('add bread ' . $table)){
                $alunoHasPermission = true;
            }
        } catch (\Throwable $e) {
            $alunoHasPermission = false;
        }
        if(!$alunoHasPermission){
            if(empty(Auth::user())){
                abort('401');
            }else{
                if(!Auth::user()->can('add bread ' . $table)){
                    abort('401');
                }
            }
        }
        $toValidate = array();
        $form = Form::find( $table );
        $formFields = FormField::where('form_id', '=', $table)->where('add', '=', '1')->get();
        foreach($formFields as $formField){
            if ($formField->required == 1){
                $toValidate[$formField->column_name] = 'required';
            }
        }

        $request->validate($toValidate);
        if($form->add == 1){
            $resourceService = new ResourceService();

            if ($form->id == 12){
                $fichadetreino = new FichaDeTreino();
                $fichadetreino = FichaDeTreino::find($request['ficha_de_treino_id']);

                $codigotreino = $fichadetreino->treinoexercicioporcodigo($fichadetreino);
                $codigotreino = array_keys($codigotreino->toArray());

//                echo "<pre>"; print_r($codigotreino); exit(' aa');

                if (!in_array($request['codigo_treino'], $codigotreino)){
                    $fltreinododia = 'nao';
                    $qtdrealizado = 0;

                    $treinorealizado = new TreinoRealizado($request['ficha_de_treino_id'], $request['codigo_treino'], $fltreinododia, $qtdrealizado);
                    $treinorealizado->save();
                }
            }

            $resourceService->add($form->id, $form->table_name, $request->all() );
            $request->session()->flash('message', 'Adicionado com sucesso!');
            return redirect()->route('resource.index', $table );
        }else{
            abort('401');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($table, $id, Request $request)
    {
        $role = Role::where('name', '=', 'admin')->first();
        try {
            if($role->hasPermissionTo('read bread ' . $table)){
                $alunoHasPermission = true;
            }
        } catch (\Throwable $e) {
            $alunoHasPermission = false;
        }
        if(!$alunoHasPermission){
            if(empty(Auth::user())){
                abort('401');
            }else{
                if(!Auth::user()->can('read bread ' . $table)){
                    abort('401');
                }
            }
        }
        $form = Form::find( $table );
        if($form->read == 1){
            $resourceService = new ResourceService();
            return view('dashboard.resource.show', [
                'form' => $form,
                'columns' => $resourceService->show($form->id, $form->table_name, $id),
            ]);
        }else{
            abort('401');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($table, $id)
    {
        $role = Role::where('name', '=', 'admin')->first();
        try {
            if($role->hasPermissionTo('edit bread ' . $table)){
                $alunoHasPermission = true;
            }
        } catch (\Throwable $e) {
            $alunoHasPermission = false;
        }
        if(!$alunoHasPermission){
            if(empty(Auth::user())){
                abort('401');
            }else{
                if(!Auth::user()->can('edit bread ' . $table)){
                    abort('401');
                }
            }
        }
        $form = Form::find( $table );
        if($form->edit == 1){
            $resourceService = new ResourceService();
            $formService = new FormService();
            return view('dashboard.resource.edit', [
                'form' => $form,
                'columns' => $resourceService->getColumnsForEdit( $form->table_name, $table, $id ),
                'relations' => $resourceService->getRelations( FormField::where('form_id', '=', $table)->where('edit', '=', '1')->get()),
                'inputOptions' => $formService->getFromOptionsStandardInput(),
                'id' => $id,
            ]);
        }else{
            abort('401');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($table, $id, Request $request)
    {
        $role = Role::where('name', '=', 'admin')->first();
        try {
            if($role->hasPermissionTo('edit bread ' . $table)){
                $alunoHasPermission = true;
            }
        } catch (\Throwable $e) {
            $alunoHasPermission = false;
        }
        if(!$alunoHasPermission){
            if(empty(Auth::user())){
                abort('401');
            }else{
                if(!Auth::user()->can('edit bread ' . $table)){
                    abort('401');
                }
            }
        }
        $toValidate = array();
        $form = Form::find( $table );
        $formFields = FormField::where('form_id', '=', $table)->where('add', '=', '1')->get();
        foreach($formFields as $formField){
            if ($formField->required == 1){
                $toValidate[$formField->column_name] = 'required';
            }
        }
        $request->validate($toValidate);
        if($form->edit == 1){
            $resourceService = new ResourceService();
            if ($form->id == 12){
                $fichadetreino = new FichaDeTreino();
                $fichadetreino = FichaDeTreino::find($request['ficha_de_treino_id']);

                $codigotreino = $fichadetreino->treinoexercicioporcodigo($fichadetreino);
                $codigotreino = array_keys($codigotreino->toArray());

//                echo "<pre>"; print_r($codigotreino); exit(' aa');

                if (!in_array($request['codigo_treino'], $codigotreino)){
                    $fltreinododia = 'nao';
                    $qtdrealizado = 0;

                    $treinorealizado = new TreinoRealizado($request['ficha_de_treino_id'], $request['codigo_treino'], $fltreinododia, $qtdrealizado);
                    $treinorealizado->save();
                }

            }
            $resourceService->update($form->table_name, $table, $id, $request->all() );
            $request->session()->flash('message', 'Editado com sucesso!');
            return redirect()->route('resource.index', $table );
        }else{
            abort('401');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($table, Request $request, $id)
    {
        $role = Role::where('name', '=', 'admin')->first();
        try {
            if($role->hasPermissionTo('delete bread ' . $table)){
                $alunoHasPermission = true;
            }
        } catch (\Throwable $e) {
            $alunoHasPermission = false;
        }
        if(!$alunoHasPermission){
            if(empty(Auth::user())){
                abort('401');
            }else{
                if(!Auth::user()->can('delete bread ' . $table)){
                    abort('401');
                }
            }
        }
        $form = Form::find( $table );

        //lógica para validar se o exercício pertence a uma ficha de treino
        if($form->table_name == 'exercicio') {
            $temvinculocomficha = \DB::table("treino_exercicio")->where('id', $id)->count();

            if ($temvinculocomficha > 0){
                abort('401');
            }
        }

        if($form->delete == 1){
            if($request->has('marker')){
                DB::table($form->table_name)->where('id', '=', $id)->delete();
                $request->session()->flash('message', 'Deletado com sucesso');
                return redirect()->route('resource.index', $table);
            }else{
                return view('dashboard.resource.delete', ['table' => $table, 'id' => $id, 'formName' => $form->name]);
            }
        }else{
            abort('401');
        }
    }
}
