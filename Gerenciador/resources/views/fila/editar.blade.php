@extends('layouts.default')

@section('content')
    
<h3>Editar Fila</h3>

@if($errors->any())
<ul class='alert alert-danger'>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['route' => ['fila.salvar', 'id' => $fila->id], 'method' => 'put']) !!}

<div class='form-group'>
    {!! Form::label('titulo', 'Título:') !!}
    {!! Form::text('titulo', $fila->titulo, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('descricao', 'Descrição:') !!}
    {!! Form::text('descricao', $fila->descricao, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Editar Fila', ['class'=>'btn btn-primary']) !!}
    {!! Form::submit('Limpar', ['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}

<div class="form-group">
    <h3>Usuários</h3>
    @if($fila->responsaveis->count() > 0)
    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th>Nome</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($fila->responsaveis as $responsavel)
            <tr>
                <td>{{$responsavel->name}}</td>
                <td>
                    <a href="#" onclick="return ConfirmaExclusao('{{route('fila.responsavel.excluir', ['id'=>$fila->id,'responsavel_id' => $responsavel->id])}}')" class='btn-sm btn-danger'>Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <button class='btn btn-default' data-toggle="modal" data-target="#modal-adicionar-usuario">Adicionar</button>
</div>

<div class='form-group'>
    <h4>Atividades</h4>
    
    @if($fila->solicitacoes->count() > 0)
    @include('solicitacao.listar', ['solicitacoes' => $fila->solicitacoes])
    @endif

</div>

<div class="modal fade" id='modal-adicionar-usuario' tabindex="-1" role="dialog" aria-labelledby="modal-usuario-title">
    <div class="modal-dialog" role='document'>
        <div class="modal-content">
            {!! Form::open(['route' => ['fila.responsavel.adicionar', 'id' => $fila->id], 'method' => 'post']) !!}
            <div class="modal-header">
                <h4 class="modal-title" id='modal-usuario-title'>
                    Adicionar Usuario
                </h4>
                <button type='button' class="close fa fa-times" data-dismiss='modal' aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class='form-group'>
                    @php
                        $usuarios = \App\User::whereNotIn('id', $fila->responsaveis->pluck('id')->toArray())->orderBy('name')->get();
                    @endphp
                    @if($usuarios->count() > 0)
                        {!! Form::label('responsavel_id', 'Responsável:') !!}
                        {!! Form::select('responsavel_id', 
                                $usuarios->pluck('name', 'id')->toArray(),
                                null, ['class' => 'form-control', 'required']) !!}
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type='button' class="btn btn-default" data-dismiss='modal' aria-label="Close">Fechar</button>
                {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection