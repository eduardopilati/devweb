<?php

namespace App\Http\Controllers;

use App\Fila;
use App\Http\Requests\FilaRequest;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;

class FilaController extends Controller
{
    public function inicio(){
        $filas = Fila::orderBy('titulo')->paginate(20);
        return view('fila.inicio', ['filas' => $filas]);
    }

    public function criar(){
        return view('fila.criar');
    }

    public function inserir(FilaRequest $request){
        Fila::create($request->all());
        return redirect()->route('fila');
    }

    public function editar($id){
        $fila = Fila::find($id);
        return view('fila.editar', compact('fila'));
    }

    public function salvar(FilaRequest $request, $id){
        Fila::find($id)->update($request->all());
        return redirect()->route('fila');
    }

    public function excluir($id){
        try {
            Fila::find($id)->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function adicionarResponsavel(Request $request, $id){
        Fila::find($id)->responsaveis()->attach($request->input('responsavel_id'));
        return redirect()->route('fila.editar', ['id' => $id]);
    }
    
    public function excluirResponsavel(Request $request, $id, $responsavel_id){
        Fila::find($id)->responsaveis()->detach($responsavel_id);
        return array('status' => 200, 'msg' => 'null');
    }
}
