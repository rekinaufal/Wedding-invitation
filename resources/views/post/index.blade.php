@extends('layouts.main')
@section('content')
        <h1>Hello, post</h1>
        @foreach ($posts as $post)
        <article class="mb-5 border-buttom pb-4">
                <h2>{{ $post->title }}</h2>
                <p>By. <a href="/authors/{{ $post->user->id  ?? 'unknows' }}">{{  $post->user->name ?? 'unknows' }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name  }}</a></p>
                <article>
                        <p>{{ $post->excerpt }}</p>
                        <a href="/post/{{$post->id}}" class="text-decoration-none">Read more . . .</a>
                </article>
        </article>
        @endforeach
@endsection