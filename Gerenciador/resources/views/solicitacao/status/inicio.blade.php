@extends('layouts.default')

@section('content')
    <h1>Status de Solicitações</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th>Descrição</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($solicitacaoStatus as $status)
            <tr>
                <td>{{ $status->descricao }}</td>
                <td>
                    <a href="{{ route('solicitacao.status.editar', ['id' => $status->id]) }}" class='btn-sm btn-success'>Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao('{{route('solicitacao.status.excluir', ['id' => $status->id])}}')" class='btn-sm btn-danger'>Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


{{ $solicitacaoStatus->links() }}

<a href="{{ route('solicitacao.status.criar') }}" class='btn-sm btn-info'>Adicionar</a>

@endsection