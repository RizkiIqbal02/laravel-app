@extends('layouts.main')
@section('container')
    <h1 class="mb-5">Post Category : {{ $category }}</h1>
    @foreach ($posts as $post)
        <article class="mb-5">
            <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</h2></a>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
@endsection
