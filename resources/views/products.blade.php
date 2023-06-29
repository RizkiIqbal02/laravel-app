@extends('layouts.main')
@section('container')
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Marketplace</h1>
            <p class="lead text-body-secondary">Explore here to discover market prices, stock availability, and make the process of categorizing and grouping products easier and more organized. Enjoy a more pleasant and responsive shopping experience as you browse through your desired items.</p>
            </div>
        </div>
        </section>

    <div class="album py-5 bg-body-tertiary">
        <style>
            .card-img-top {
                height: 200px; /* Ubah nilai 200px sesuai kebutuhan */
                object-fit: cover;
            }
        </style>

        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card shadow-sm m-3">
                        @if ($product->image)
                        <div class="overflow-hidden">
                            <img class="bd-placeholder-img card-img-top img-fluid" src="{{ asset('storage/'. $product->image) }}" alt="">
                        </div>
                        @endif
                        <div class="card-body">
                            <p class="card-text">Name product : {{ $product->name }}</p>
                            <p class="card-text">Category : <a href="/products?category={{ $product->category->slug }}">{{ $product->category->name }}</a></p>
                            <p class="card-text">Price : Rp.{{ $product->price }}</p>
                            <p class="card-text">Stock : {{ $product->stock }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-body-secondary">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    </div>
    </main>
@endsection
