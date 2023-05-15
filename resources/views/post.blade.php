@extends('layouts.main')

{{-- Post yang satuan sesuai nama --}}

@section('container')
    <article>
        <h1>{{ $post["title"] }}</h1>
        <p>created By. Rizki Iqbal Muladi in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        {!! $post->body !!}
    </article>

    <a href="/posts">kembali ke halaman utama</a>
@endsection
