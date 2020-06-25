<?php

namespace App\Http\Controllers;

use App\AtividadeStatus;
use App\Http\Requests\AtividadeStatusRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;

class AtividadeStatusController extends Controller
{
    public function inicio(){
        $solicitacaoStatus = AtividadeStatus::orderBy('descricao')->paginate(20);
        return view('solicitacao.atividade.status.inicio', ['solicitacaoStatus' => $solicitacaoStatus]);
    }

    public function criar(){
        return view('solicitacao.atividade.status.criar');
    }

    public function inserir(AtividadeStatusRequest $request){
        AtividadeStatus::create($request->all());
        return redirect()->route('solicitacao.atividade.status');
    }

    public function editar($id){
        $solicitacaoStatus = AtividadeStatus::find($id);
        return view('solicitacao.atividade.status.editar', compact('solicitacaoStatus'));
    }

    public function salvar(AtividadeStatusRequest $request, $id){
        AtividadeStatus::find($id)->update($request->all());
        return redirect()->route('solicitacao.atividade.status');
    }

    public function excluir($id){
        try {
            AtividadeStatus::find($id)->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
