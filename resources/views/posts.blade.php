
@extends('layouts.main')
@section('container')
    @foreach ($posts as $post)
    <article class="mb-5">
        <h2>
            <a href="posts/{{ $post["slug"] }}">{{ $post["title"] }}</h2></a>
        <h4>By : {{ $post["author"] }}</h4>
        <p>{{ $post["body"] }}</p>
    </article>
    @endforeach
@endsection
