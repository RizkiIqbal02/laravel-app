@extends('layouts.main')

{{-- Post yang satuan sesuai nama --}}

@section('container')
    <article>
        <h2>{{ $post["title"] }}</h2>
        <h5>{{ $post["author"] }}</h5>
        <p>{{ $post["body"] }}</p>
    </article>

    <a href="/posts">kembali ke halaman utama</a>
@endsection
