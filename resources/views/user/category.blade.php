@extends('layouts.main')
@section('content')
        <h1>Post Category : {{ $category }}</h1>
        @foreach ($posts as $post)
        <article>
                <h2>{{ $post->title }}</h2>
                <a href="/categories/{{ $post->category->slug }}"><p>{{ $post->category->name  }}</p></a>
                <article>
                        <p>{{ $post->body }}</p>
                </article>
        </article>
        @endforeach
@endsection