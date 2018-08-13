@extends('layouts.app')
@section('content')
<div class="container">
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    <section class="articles">
    @foreach($post as $key => $value)
        <div class="column is-8 is-offset-2">
        <div class="card article">
                    
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content has-text-centered">
                                <p class="title article-title">{{$value->titulo}}</p>
                                <p class="subtitle is-6 article-subtitle">
                                    <p>{{ $value->name }}</p> Criado em : {{$value->created_at}} Editado em: {{$value->updated_at}}
                                </p>
                            </div>
                        </div>
                        <div class="content article-body">
                            <p>
                                {{$value->descricao}}
                            </p>
                        </div>
                    </div>
                </div>
                <a class="button is-warning" href="{{route('post.edit',$value->slug)}}">Editar</a>
                {!! Form::open(['method' => 'DELETE','route' => ['post.destroy', $value->slug]]) !!}
                {!! Form::submit('Excluir', ['class' => 'button is-danger']) !!}
                {!! Form::close() !!}
        </div>
        
        @endforeach
        <div>                           
            {!! $post->links() !!}
        </div>
    </section>   
</div>

@endsection

