@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Your posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive small">
        <a href="/dashboard/posts/create" class="btn btn-success"><i class="bi bi-pencil-fill"></i> Create post</a>
        <table class="table table-striped table-sm mt-2">
          <thead>
            <tr>
              <th scope="col">#</th>
              {{-- <th scope="col">Category</th> --}}
              <th scope="col">Slug</th>
              <th scope="col">Body</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $index => $post)
                <tr>
                <td>{{ $loop->iteration }}</td>
                {{-- <td>{{ $post->category->name }}</td> --}}
                <td>{{ $post->slug }}</td>
                <td>{{ substr($post->body, 0, 100) . '...' }}</td>
                <td>
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="/dashboard/posts/{{ $post->slug }}"><i class=" bi bi-eye-fill"></i> Show</a>
                        <a class="dropdown-item" href="/dashboard/posts/{{ $post->slug }}/edit"><i class="bi bi-pencil-fill"></i> Edit</a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="dropdown-item" onclick="return confirm('Are You sure about that?')"><i class="bi bi-trash-fill"></i> Delete</button>
                        </form>
                    </ul>

                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection
