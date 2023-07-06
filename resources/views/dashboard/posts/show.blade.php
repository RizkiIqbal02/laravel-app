@extends('dashboard.layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5 my-3">
            <div class="col-md-8">
                <article>
                    <h1 class="mb-2">{{ $post["title"] }}</h1>

                    <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-left"></i> Back</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i
                            class="bi bi-pencil-fill"></i> Edit</a>
                    {{-- <a href="/dashboard/posts" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</a> --}}
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are You sure about that?')"><i
                                class="bi bi-trash-fill"></i> Delete
                        </button>
                    </form>

                    @if ($post->image)
                        <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top mb-3 mt-3 rounded"
                             alt="...">
                    @else
                        {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mb-3 mt-3 rounded" alt="..."> --}}
                    @endif


                    {!! $post->body !!}
                </article>


            </div>
        </div>
    </div>
@endsection
