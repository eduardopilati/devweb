@extends('layouts.default')

@section('content')
    
<h3>Nova Solicitacao</h3>

@if($errors->any())
<ul class='alert alert-danger'>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['route' => 'solicitacao.inserir']) !!}

<div class='form-group'>
    {!! Form::label('titulo', 'Título:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('descricao', 'Descrição:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('prioridade', 'Prioridade:') !!}
    {!! Form::text('prioridade', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('solicitante', 'Solicitante:') !!}
    {!! Form::text('solicitante', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('email_solicitante', 'E-mail do Solicitante:') !!}
    {!! Form::text('email_solicitante', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('fila_id', 'Fila:') !!}
    {!! Form::select('fila_id', 
            \App\Fila::orderBy('titulo')->pluck('titulo', 'id')->toArray(),
            null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('solicitacao_status_id', 'Status:') !!}
    {!! Form::select('solicitacao_status_id', 
            \App\SolicitacaoStatus::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
            null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Criar Solicitacao', ['class'=>'btn btn-primary']) !!}
    {!! Form::submit('Limpar', ['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}
@endsection
