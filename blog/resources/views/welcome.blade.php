@extends('layouts.app')
@section('content')
<div class="container">
    <section class="articles">
        <div class="column is-8 is-offset-2">
        <div class="card article">

                    @foreach($post as $post)
                    {{ $post->titulo }}
                    @endforeach
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content has-text-centered">
                                <p class="title article-title">Titulo</p>
                                <p class="subtitle is-6 article-subtitle">
                                    <a href="#">@autor</a> on February 17, 2018
                                </p>
                            </div>
                        </div>
                        <div class="content article-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Accumsan lacus vel facilisis volutpat est velit egestas. Sapien eget mi proin sed. Sit amet mattis vulputate enim.
                            </p>
                            <p>
                                Commodo ullamcorper a lacus vestibulum sed arcu. Fermentum leo vel orci porta non. Proin fermentum leo vel orci porta non pulvinar. Imperdiet proin fermentum leo vel. Tortor posuere ac ut consequat semper viverra. Vestibulum lectus mauris ultrices eros.
                            </p>
                            <p>
                                In eu mi bibendum neque egestas congue quisque egestas diam. Enim nec dui nunc mattis enim ut tellus. Ut morbi tincidunt augue interdum velit euismod in. At in tellus integer feugiat scelerisque varius morbi enim nunc. Vitae suscipit tellus mauris a diam.
                                Arcu non sodales neque sodales ut etiam sit amet.
                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</div>
@endsection

