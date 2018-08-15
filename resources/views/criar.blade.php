@extends('layouts.app')

@section('content')
<div class="container">

    <div class="columns">
        <div class="column">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            @if(isset($errors) && count ($errors) > 0)
            @foreach($errors->all() as $erro)
            <p>{{ $erro }}</p>
            @endforeach
            @endif

            @if(isset($post))
            {{Form::model($post, array('route' => array('post.update', $post->slug), 'method' => 'put'))}}
            @else
            {{ Form::open(['route' => 'post.store']) }}
            @endif

            <div class="form-group">
                {{ Form::label('titulo', 'Título') }}
                {{ Form::text('titulo', null, ['class' => 'input']) }}
            </div>

            <div class="form-group">
                {{ Form::label('descricao', 'Descrição') }}
                {{ Form::text('descricao', null, ['class' => 'textarea']) }}
            </div>

            {{ Form::submit('Enviar', ['class' => 'button is-large is-success']) }}

            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection