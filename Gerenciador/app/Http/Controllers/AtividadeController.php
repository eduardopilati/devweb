<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Http\Requests\AtividadeRequest;
use Illuminate\Database\QueryException;
use PDOException;

class AtividadeController extends Controller
{
    public function inicio($solicitacao_id){
        $atividades = Atividade::where('solicitacao_id', $solicitacao_id)->orderBy('titulo');
        return view('solicitacao.atividade.inicio', ['atividades' => $atividades, 'solicitacao_id' => $solicitacao_id]);
    }

    public function criar($solicitacao_id){
        return view('solicitacao.atividade.criar', ['solicitacao_id' => $solicitacao_id]);
    }

    public function inserir(AtividadeRequest $request, $solicitacao_id){
        $atividade = Atividade::create($request->all());
        $atividade->solicitacao_id = $solicitacao_id;
        return redirect()->route('solicitacao.editar', $solicitacao_id);
    }

    public function editar($solicitacao_id, $id){
        $atividade = Atividade::where('solicitacao_id', $solicitacao_id)->find($id);
        return view('solicitacao.atividade.editar', ['atividade' => $atividade, 'solicitacao_id' => $solicitacao_id]);
    }

    public function salvar(AtividadeRequest $request, $solicitacao_id, $id){
        Atividade::where('solicitacao_id', $solicitacao_id)->find($id)->update($request->all());
        return redirect()->route('solicitacao.editar', $solicitacao_id);
    }

    public function excluir($solicitacao_id, $id){
        try {
            Atividade::where('solicitacao_id', $solicitacao_id)->find($id)->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
