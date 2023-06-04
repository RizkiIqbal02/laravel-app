
@extends('layouts.main')
@section('container')
    <h1 class="mb-5 mt-3">{{ $title }}</h1>

    <div class="row">
        <div class="col-md-5">
            <form action="/posts">
            
            </form>
        </div>
    </div>

    @if ($posts->count())
    <div class="card mb-5">
        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h5>

          <p><small class="text-body-secondary">created By. <a class="text-decoration-none" href="/authors/{{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a class="text-decoration-none" href="/categories/{{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</small></p>
          <p class="card-text">{{ $posts[0]->excerpt }}</p>

          <a class="text-decoration-none btn btn-danger" href="/posts/{{ $posts[0]->slug }}">Read more</a>
        </div>
      </div>


    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"> <a href="/categories/{{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                        <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>

                        <p><small class="text-body-secondary">created By. <a class="text-decoration-none" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>{{ $post->created_at->diffForHumans() }}</small></p>

                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4"> No post found</p>
    @endif
@endsection
