@extends('layouts.default')

@section('content')
@foreach (\App\Fila::orderBy('titulo')->get() as $fila)
    <div class="form-group">
        <h3>{{$fila->titulo}}</h3>
        @if($fila->solicitacoes->count() > 0)
        @include('solicitacao.listar', ['solicitacoes' => $fila->solicitacoes])
        @endif
    </div>
@endforeach
<a href="{{ route('solicitacao.criar') }}" class='btn-sm btn-info'>Adicionar solicitacao</a>
@endsection
