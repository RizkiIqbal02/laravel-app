@extends('layouts.main')

{{-- Post yang satuan sesuai nama --}}

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <article>
                    <h1 class="mb-2">{{ $post["title"] }}</h1>

                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mb-3" alt="...">

                    <p class="mb-5">created By. <a class="text-decoration-none" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                    {!! $post->body !!}
                </article>

                <a href="/posts">kembali ke halaman utama</a>
            </div>
        </div>
    </div>


@endsection
