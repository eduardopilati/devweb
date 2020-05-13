<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nacionalidade;
use App\Http\Requests\NacionalidadeRequest;

class NacionalidadesController extends Controller
{
    public function index()
    {
        $nacionalidades = Nacionalidade::orderBy('descricao')->paginate(5);
        return view('nacionalidades.index', ['nacionalidades' => $nacionalidades]);
    }

    public function create()
    {
        return view('nacionalidades.create');
    }

    public function store(NacionalidadeRequest $request)
    {
        $novo = $request->all();
        Nacionalidade::create($novo);
        return redirect()->route('nacionalidades');
    }

    public function destroy($id)
    {
        try {
            Nacionalidade::find($id)->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function edit($id)
    {
        $nacionalidade = Nacionalidade::find($id);
        return view('nacionalidades.edit', compact('nacionalidade'));
    }

    public function update(NacionalidadeRequest $request, $id)
    {
        Nacionalidade::find($id)->update($request->all());
        return redirect()->route('nacionalidades');
    }
}
