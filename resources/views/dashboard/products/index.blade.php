@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Your Products</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive small">
        <a href="/dashboard/products/create" class="btn btn-success"><i class="bi bi-pencil-fill"></i> Create Product</a>
        <table class="table table-striped table-sm mt-2">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              <th scope="col">Stock</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $index => $product)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <div class="dropdown-center">
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="/dashboard/products/{{ $product->id }}/edit"><i class="bi bi-pencil-fill"></i> Edit</a>
                            <form action="/dashboard/products/{{ $product->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="dropdown-item" onclick="return confirm('Are You sure about that?')"><i class="bi bi-trash-fill"></i> Delete</button>
                            </form>
                        </ul>
                    </div>

                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection
