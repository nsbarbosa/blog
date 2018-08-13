@extends('layouts.app')

@section('content')

<div class="container">

 {{Form::model($post, array('route' => array('post.update', $post->slug), 'method' => 'put'))}}

<div class="form-group">
    {{ Form::label('titulo', 'titulo') }}
    {{ Form::text('titulo') }}
</div>

<div class="form-group">
    {{ Form::label('descricao', 'descricao') }}
    {{ Form::text('descricao') }}
</div>

{{ Form::submit('Editar', array('class' => 'button is-success')) }}

{{ Form::close() }}

</div>
@endsection

