@extends('layouts.default')

@section('content')
    
<h3>Nova Atividade</h3>

@if($errors->any())
<ul class='alert alert-danger'>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['route' => ['solicitacao.atividade.inserir', 'solicitacao_id' => $solicitacao_id]]) !!}

<input type="hidden" name="solicitacao_id" value="{{$solicitacao_id}}">
<div class='form-group'>
    {!! Form::label('titulo', 'Título:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('tempo_trabalhado', 'Tempo Trabalhado:') !!}
    {!! Form::text('tempo_trabalhado', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('user_id', 'Responsável:') !!}
    {!! Form::select('user_id', 
            \App\User::orderBy('name')->pluck('name', 'id')->toArray(),
            null, ['class' => 'form-control', 'required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('atividade_status_id', 'Status da Atividade:') !!}
    {!! Form::select('atividade_status_id', 
            \App\AtividadeStatus::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
            null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Criar Atividade', ['class'=>'btn btn-primary']) !!}
    {!! Form::submit('Limpar', ['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}
@endsection