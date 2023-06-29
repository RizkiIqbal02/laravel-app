
@extends('layouts.main')
@section('container')

<div class="container">
    <h1 class="mb-3 mt-3 text-center">Product Categories</h1>
    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($categories as $category)
            <div class="col-lg-2 mb-3 m-5">
                <a href="/products?category={{ $category->slug }}">
                    <div class="card text-bg-dark">
                        <img src="https://source.unsplash.com/500x300?{{ $category->name }}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
