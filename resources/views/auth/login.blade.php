@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input name="email" class="input" type="email" placeholder="Digite seu email" value="{{ old('email') }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Senha</label>
            <div class="control">
                <input name="password" class="input" type="password" placeholder="Digite uma senha" required>
            </div>
        </div>
        
        <div class="field">
            <label class="checkbox">
            <input name="remember" type="checkbox">
                Lembrar
            </label>            
        </div>

        <div class="field">
        <button type="submit" class="button is-success">
            Enviar
        </button>
        </div>
    </form>

</div>
@endsection
