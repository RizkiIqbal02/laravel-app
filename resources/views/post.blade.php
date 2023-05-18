@extends('layouts.main')

{{-- Post yang satuan sesuai nama --}}

@section('container')
    <article>
        <h1 class="mb-2">{{ $post["title"] }}</h1>
        <p class="mb-3">created By. <a class="text-decoration-none" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        {!! $post->body !!}
    </article>

    <a href="/posts">kembali ke halaman utama</a>
@endsection
