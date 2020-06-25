@extends('layouts.default')

@section('content')
    
<h3>Novo Status de Solicitacao</h3>

@if($errors->any())
<ul class='alert alert-danger'>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['route' => 'solicitacao.status.inserir']) !!}

<div class='form-group'>
    {!! Form::label('descricao', 'Descrição:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Criar Status de Solicitação', ['class'=>'btn btn-primary']) !!}
    {!! Form::submit('Limpar', ['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}
@endsection