<table class="table table-stripe table-bordered table-hover">
    <thead>
        <th>Título</th>
        <th>Descrição</th>
        <th>Prioridade</th>
        <th>Solicitante</th>
        <th>E-mail do Solicitante</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach($solicitacoes as $solicitacao)
        <tr>
            <td>{{$solicitacao->titulo}}</td>
            <td>{{ $solicitacao->descricao }}</td>
            <td>{{ $solicitacao->prioridade }}</td>
            <td>{{ $solicitacao->solicitante }}</td>
            <td>{{ $solicitacao->email_solicitante }}</td>
            <td>
                <a href="{{ route('solicitacao.editar', ['id' => $solicitacao->id]) }}" class='btn-sm btn-success'>Editar</a>
                <a href="#" onclick="return ConfirmaExclusao('{{route('solicitacao.excluir', ['id' => $solicitacao->id])}}')" class='btn-sm btn-danger'>Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>