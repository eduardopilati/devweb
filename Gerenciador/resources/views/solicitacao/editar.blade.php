@extends('layouts.default')

@section('content')
    
<h3>Editar Solicitação</h3>

@if($errors->any())
<ul class='alert alert-danger'>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['route' => ['solicitacao.salvar', 'id' => $solicitacao->id], 'method' => 'put']) !!}

<div class='form-group'>
    {!! Form::label('titulo', 'Título:') !!}
    {!! Form::text('titulo', $solicitacao->titulo, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('descricao', 'Descrição:') !!}
    {!! Form::text('descricao', $solicitacao->descricao, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('prioridade', 'Prioridade:') !!}
    {!! Form::text('prioridade', $solicitacao->prioridade, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('solicitante', 'Solicitante:') !!}
    {!! Form::text('solicitante', $solicitacao->solicitante, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('email_solicitante', 'E-mail do Solicitante:') !!}
    {!! Form::text('email_solicitante', $solicitacao->email_solicitante, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('fila_id', 'Fila:') !!}
    {!! Form::select('fila_id', 
            \App\Fila::orderBy('titulo')->pluck('titulo', 'id')->toArray(),
            $solicitacao->fila_id, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('solicitacao_status_id', 'Status:') !!}
    {!! Form::select('solicitacao_status_id', 
            \App\SolicitacaoStatus::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
            $solicitacao->solicitacao_status_id, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Editar Solicitacao', ['class'=>'btn btn-primary']) !!}
    {!! Form::submit('Limpar', ['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}

<div class='form-group'>
    <h4>Atividades</h4>
    
    @if($solicitacao->atividades->count() > 0)
    @include('solicitacao.atividade.inicio', ['atividades' => $solicitacao->atividades])
    @endif

    <a href="{{ route('solicitacao.atividade.criar', ['solicitacao_id' => $solicitacao->id]) }}" class='btn-sm btn-info'>Adicionar</a>
</div>
@endsection