@extends('layouts.app')
@section('content')
<div class="container">
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    <section class="articles">
    
        <div class="column is-8 is-offset-2">
        <div class="card article">
                    
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content has-text-centered">
                                <p class="title article-title">{{$post->titulo}}</p>
                                <p class="subtitle is-6 article-subtitle">
                                    Escrito por 
                                    {{$post->name}}
                                </p>
                                <p class="subtitle is-6 article-subtitle">
                                   Atualizado em: {{$post->updated_at}}
                                </p>
                            </div>
                        </div>
                        <div class="content article-body">
                            <p>
                                {{$post->descricao}}
                            </p>
                        </div>
                    </div>
                </div>
                
        </div>
        
    </section>   
</div>

@endsection

