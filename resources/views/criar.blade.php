@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="{{route('post.store')}}">
        {{ csrf_field() }}

        <div class="field">
            <label class="label">Título</label>
            <div class="control">
                <input name="titulo" class="input" type="text" placeholder="Digite o titulo" value="{{ old('titulo') }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Descricao</label>
            <div class="control">
                <input name="descricao" class="textarea" type="text" placeholder="Digite o conteudo" required>
            </div>
        </div>

        <div class="field">
        <button type="submit" class="button is-success">
            Enviar
        </button>
        </div>
    </form>

</div>
@endsection