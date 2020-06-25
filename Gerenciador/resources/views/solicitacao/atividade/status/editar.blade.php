@extends('layouts.default')

@section('content')
    
<h3>Editar Status de Atividade</h3>

@if($errors->any())
<ul class='alert alert-danger'>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['route' => ['solicitacao.atividade.status.salvar', 'id' => $solicitacaoStatus->id], 'method' => 'put']) !!}

<div class='form-group'>
    {!! Form::label('descricao', 'Descrição:') !!}
    {!! Form::text('descricao', $solicitacaoStatus->descricao, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Editar Status de Atividade', ['class'=>'btn btn-primary']) !!}
    {!! Form::submit('Limpar', ['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}
@endsection