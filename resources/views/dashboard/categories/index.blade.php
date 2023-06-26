@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Your categories</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
 
    <div class="table-responsive small col-lg-4">
        <a href="/dashboard/categories/create" class="btn btn-success"><i class="bi bi-pencil-fill"></i> Create categories</a>
        <table class="table table-striped table-sm mt-2">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $index => $category)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <a class="text-white border border-info bg-info p-1 rounded px-2 py-1" href="/dashboard/categories/{{ $category->slug }}"><i class=" bi bi-eye-fill"></i></a>
                    <a class="text-white border border-warning bg-warning p-1 rounded px-2" href="/dashboard/categories/{{ $category->slug }}/edit"><i class="bi bi-pencil-fill"></i></a>
                    <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="text-white border-0 border-danger bg-danger p-1 rounded px-2" onclick="return confirm('Are You sure about that?')"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection
