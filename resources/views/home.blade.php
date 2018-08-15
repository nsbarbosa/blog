@extends('layouts.app') @section('content')
<div class="container">
    <div class="columns">
        <div class="column">
            <h3 class="has-text-centered">Posts</h3>

            <section class="articles">
                @foreach($post as $key => $value)
                <div class="column is-8 is-offset-2">
                    <div class="card article">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content has-text-centered">
                                    <a href="{{route('post.show',$value->slug)}}">{{$value->titulo}}</a>
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

                </div>

                @endforeach
                <div>
                    {!! $post->links() !!}
                </div>
            </section>
        </div>
    </div>
</div>


@endsection