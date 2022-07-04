@extends('admin.index')
@section('content')
        <h1>Hello, post</h1>
        @foreach ($Users as $item)
        <article class="mb-5 border-buttom pb-4">
                <h2>{{ $item->name }}</h2>
                <article>
                        <p>{{ $item->email }}</p>
                        <a href="" class="text-decoration-none">Read more . . .</a>
                </article>
        </article>
        @endforeach
@endsection