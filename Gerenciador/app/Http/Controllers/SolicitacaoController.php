<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitacaoRequest;
use App\Solicitacao;
use Illuminate\Database\QueryException;
use PDOException;

class SolicitacaoController extends Controller
{
    public function inicio(){
        $solicitacoes = Solicitacao::orderBy('titulo')->paginate(20);
        return view('solicitacao.inicio', ['solicitacoes' => $solicitacoes]);
    }

    public function criar(){
        return view('solicitacao.criar');
    }

    public function inserir(SolicitacaoRequest $request){
        Solicitacao::create($request->all());
        return redirect()->route('solicitacao');
    }

    public function editar($id){
        $solicitacao = Solicitacao::find($id);
        return view('solicitacao.editar', compact('solicitacao'));
    }

    public function salvar(SolicitacaoRequest $request, $id){
        Solicitacao::find($id)->update($request->all());
        return redirect()->route('solicitacao');
    }

    public function excluir($id){
        try {
            Solicitacao::find($id)->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
