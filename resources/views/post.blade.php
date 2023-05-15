@extends('layouts.main')

{{-- Post yang satuan sesuai nama --}}

@section('container')
    <article>
        <h1>{{ $post["title"] }}</h1>
        {!! $post->body !!}
    </article>

    <a href="/posts">kembali ke halaman utama</a>
@endsection
