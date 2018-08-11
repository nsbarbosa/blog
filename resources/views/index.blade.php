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
                                    <a href="#">{{ $value->id_autor }}</a> on February 17, 2018
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
        </div>
        @endforeach
    </section>
</div>
@endsection

