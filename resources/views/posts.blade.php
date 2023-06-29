
@extends('layouts.main')
@section('container')

    <h1 class="mb-5 mt-5 text-center">{{ $title }}</h1>


    {{-- Search --}}
    {{-- <div class="row justify-content-center m-2">
        <div class="col-md-10">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control p-2" placeholder="Cari post.." name="search" value="{{ request('search') }}" autofocus>
                    <button class="btn btn-danger" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div> --}}


    @if ($posts->count())
        <div class="container-fluid d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="card mb-3">
                            <div class="card-body">

                                <a class="text-decoration-none card-title fs-5 fw-bold align-text-bottom" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}
                                    @if ( $post->author->is_admin)
                                        <i class="bi bi-check-circle-fill text-primary text-small align-text-top"></i>
                                    @endif
                                </a>
                                <p class="card-text"><small class="text-body-secondary">Last updated {{ $post->created_at->diffForHumans() }}</small></p>

                                <div class="post-body">
                                    @php
                                        $isLong = strlen($post->body) > 100;
                                        $shortBody = $isLong ? substr($post->body, 0, 100) . '...' : $post->body;
                                    @endphp

                                    <p class="card-text mb-2">
                                        <span class="short-body{{ $loop->index }}">{{ nl2br(strip_tags($shortBody)) }}</span>
                                        <span class="full-body{{ $loop->index }}" style="display: none;">{{ nl2br(strip_tags($post->body, '<h1>')) }}</span>
                                    </p>
                                    @if ($isLong)
                                        <a href="#" class="btn-show-more" data-post-id="{{ $loop->index }}">Show more</a>
                                    @endif
                                </div>

                                @if ($post->image)
                                    <img src="{{ asset('storage/'. $post->image) }}" class="card-img-bottom rounded img-fluid" alt="...">
                                @else
                                    {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-bottom rounded" alt="..."> --}}
                                @endif

                                <hr class="divider">
                                {{-- <a href="#" class="card-text mt-3 font-weight-10 d-inline mx-3 text-decoration-none text-reset"><i class="bi bi-hand-thumbs-up"> 1</i></a> --}}
                                {{-- <a href="#" class="card-text mt-3 font-weight-10 d-inline text-decoration-none text-reset"><i class="bi bi-hand-thumbs-down"> 1</i></a> --}}
                                {{-- <a href="#" class="card-text mt-3 font-weight-10 d-inline mx-3 text-decoration-none text-reset"><i class="bi bi-chat-dots"></i> 1</a> --}}
                                {{-- <a href="/post/{{ $post->slug }}" class="card-text mt-3 font-weight-10 d-inline text-decoration-none text-reset"><i class="bi bi-box-arrow-in-up-right"></i></a> --}}


                                <!-- Button trigger modal -->
                                <button type="button" class="card-text mt-0 font-weight-10 d-inline mx-3 text-decoration-none text-reset">
                                    <i class="bi bi-hand-thumbs-up"></i>1
                                </button>
                                <button type="button" class="card-text mt-0 font-weight-10 d-inline text-decoration-none text-reset">
                                    <i class="bi bi-hand-thumbs-down"></i>1
                                </button>
                                <button type="button" class="card-text mt-0 font-weight-10 d-inline mx-3 text-decoration-none text-reset" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $post->id }}">
                                    <i class="bi bi-chat-dots"></i> 1
                                </button>
                                <button type="button" class="card-text mt-0 font-weight-10 d-inline text-decoration-none text-reset" onclick="window.location.href='/post/{{ $post->slug }}'">
                                    <i class="bi bi-box-arrow-in-up-right"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        {{-- modal pembungkus --}}
                                    <div class="modal-content bg-dark text-bg-dark">
                                        {{-- modal header --}}
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Post by {{ $post->author->name }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        {{-- Modal body --}}
                                        <div class="modal-body">
                                            <a class="text-decoration-none card-title fs-5 fw-bold" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}
                                                @if ( $post->author->is_verified)
                                                <i class="bi bi-check-circle-fill text-primary text-small align-text-top"></i>
                                                @endif
                                            </a>
                                            <p class="card-text"><small class="text-bg-dark">Last updated {{ $post->created_at->diffForHumans() }}</small></p>

                                            <div class="post-body mb-3">
                                                {!! $post->body !!}
                                            </div>

                                            @if ($post->image)
                                                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-bottom rounded img-fluid" alt="...">
                                            @endif

                                            <hr class="divider">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="card-text mt-0 font-weight-10 d-inline mx-3 text-decoration-none text-reset bg-dark">
                                                <i class="bi bi-hand-thumbs-up"></i>1
                                            </button>
                                            <button type="button" class="card-text mt-0 font-weight-10 d-inline text-decoration-none text-reset bg-dark">
                                                <i class="bi bi-hand-thumbs-down"></i>1
                                            </button>
                                            <button type="button" class="card-text mt-0 font-weight-10 d-inline mx-3 text-decoration-none text-reset bg-dark">
                                                <i class="bi bi-chat-dots"></i> 1
                                            </button>
                                        </div>
                                        {{-- Modal footer body --}}
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    @else
        <p class="text-center fs-4"> No post found</p>
    @endif



    {{-- OLD MODEL DISPLAY POSTS --}}
    {{-- @if ($posts->count())
    <div class="card mb-5">

        @if ($posts[0]->image)
            <img src="{{ asset('storage/'. $posts[0]->image) }}" class="card-img-top rounded" alt="...">
        @else
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
        @endif
        <div class="card-body">
            <h5 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h5>

            <p><small class="text-body-secondary">created By. <a class="text-decoration-none" href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</small></p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>

            <a class="text-decoration-none btn btn-danger" href="/posts/{{ $posts[0]->slug }}">Read more</a>
        </div>
        </div>


    <div class="container text-center">
        <div class="row flex justify-content-center mb-5">

            @foreach ($posts->skip(1) as $post)
                <div class="col-lg-4">
                    <div class="card" style="width: 26rem;">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"> <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                        @if ($post->image)
                            <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top rounded" alt="...">
                        @else
                            <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}" class="card-img-top" alt="...">
                        @endif

                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>

                        <p><small class="text-body-secondary">created By. <a class="text-decoration-none" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>{{ $post->created_at->diffForHumans() }}</small></p>

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
    @endif --}}


@endsection
