<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitacaoStatusRequest;
use App\SolicitacaoStatus;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;

class SolicitacaoStatusController extends Controller
{
    public function inicio(){
        $solicitacaoStatus = SolicitacaoStatus::orderBy('descricao')->paginate(20);
        return view('solicitacao.status.inicio', ['solicitacaoStatus' => $solicitacaoStatus]);
    }

    public function criar(){
        return view('solicitacao.status.criar');
    }

    public function inserir(SolicitacaoStatusRequest $request){
        SolicitacaoStatus::create($request->all());
        return redirect()->route('solicitacao.status');
    }

    public function editar($id){
        $solicitacaoStatus = SolicitacaoStatus::find($id);
        return view('solicitacao.status.editar', compact('solicitacaoStatus'));
    }

    public function salvar(SolicitacaoStatusRequest $request, $id){
        SolicitacaoStatus::find($id)->update($request->all());
        return redirect()->route('solicitacao.status');
    }

    public function excluir($id){
        try {
            SolicitacaoStatus::find($id)->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
