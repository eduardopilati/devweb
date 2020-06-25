@extends('layouts.default')

@section('content')
    <h1>Filas</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th>Título</th>
            <th>Descrição</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($filas as $fila)
            <tr>
                <td>{{$fila->titulo}}</td>
                <td>{{ $fila->descricao }}</td>
                <td>
                    <a href="{{ route('fila.editar', ['id' => $fila->id]) }}" class='btn-sm btn-success'>Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao('{{route('fila.excluir', ['id' => $fila->id])}}')" class='btn-sm btn-danger'>Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


{{ $filas->links() }}

<a href="{{ route('fila.criar') }}" class='btn-sm btn-info'>Adicionar</a>

@endsection