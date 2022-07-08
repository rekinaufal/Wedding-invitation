@extends('layouts.main')
@section('content')
        <article>
                <h2>{{ $post->title }}</h2>
                <a href="/categories/{{ $post->category->slug }}"><p>{{ $post->category->name  }}</p></a>
                <article>
                        <p>{{ $post->body }}</p>
                </article>
        </article>
@endsection