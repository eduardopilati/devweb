<table class="table table-stripe table-bordered table-hover">
    <thead>
        <th>Título</th>
        <th>Tempo Trabalhado</th>
        <th>Usuario</th>
        <th>Status da Atividade</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach($atividades as $atividade)
        <tr>
            <td>{{$atividade->titulo}}</td>
            <td>{{ $atividade->tempo_trabalhado }}</td>
            <td>{{ $atividade->user->name }}</td>
            <td>{{ $atividade->atividadeStatus->descricao }}</td>
            <td>
                <a href="{{ route('solicitacao.atividade.editar', ['id' => $atividade->id, 'solicitacao_id' => $atividade->solicitacao_id]) }}" class='btn-sm btn-success'>Editar</a>
                <a href="#" onclick="return ConfirmaExclusao('{{route('solicitacao.atividade.excluir', ['id' => $atividade->id,  'solicitacao_id' => $atividade->solicitacao_id])}}')" class='btn-sm btn-danger'>Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>