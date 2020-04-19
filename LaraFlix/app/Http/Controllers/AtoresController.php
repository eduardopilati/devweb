<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ator;
use App\Http\Requests\AtorRequest;

class AtoresController extends Controller
{
    public function index()
    {
        $atores = Ator::All();
        return view('atores.index', ['atores' => $atores]);
    }

    public function create()
    {
        return view('atores.create');
    }

    public function store(AtorRequest $request)
    {
        $novoAtor = $request->all();
        Ator::create($novoAtor);

        return redirect('atores');
    }

    public function destoy($id)
    {
        Ator::find($id)->delete();
        return redirect('atores');
    }
}
