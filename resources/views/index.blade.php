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
            <section class="articles">
                @foreach($post as $key => $value)
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <div class="card article">
                            <div class="card-header">
                                <div class="card-header-title ">
                                    <a href="{{route('post.show',$value->slug)}}">{{$value->titulo}}</a>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="has-text-centered">
                                    {{$value->descricao}}
                                </p>
                                <p class="has-text-weight-bold has-text-right is-size-5">- {{ $value->name }}</p>
                            </div>
                            <footer class="card-footer">
                                <p class="card-footer-item is-size-6">Criado em: {{$value->created_at}}</p>
                                <p class="card-footer-item is-size-6">Editado em: {{$value->updated_at}}</p>
                            </footer>
                        </div>
                        <a class="button is-large is-warning" href="{{route('post.edit',$value->slug)}}">Editar</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['post.destroy', $value->slug]]) !!}
                        {!! Form::submit('Excluir', ['class' => 'button is-large is-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

                @endforeach
            </section>
        </div>
    </div>
    <div class="columns">
        <div class="column has-text-centered">
            <div>
                {!! $post->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection