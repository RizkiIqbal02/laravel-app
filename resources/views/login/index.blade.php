@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-5">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <main class="form-signin w-100 m-auto">
            <div class="d-flex justify-content-center">
                {{-- <img class="mb-4" src="/img/iqbal.jpg" alt="" width="200" height="150"> --}}
                <svg class="bi me-2" width="200" height="150" role="img" aria-label="Bootstrap"><use xlink:href="#love"/></svg>
            </div>

            <h1 class="h3 mb-3 fw-normal text-center">Please Log in</h1>
            <form class="mb-2" action="/login" method="post">
            @csrf
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="floatingInput">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <button class="btn btn-primary w-100 py-2" type="submit">Log in</button>
            </form>
            <small>Not Registered yet? <a href="/register">Register Now!</a></small>
            <p class="mt-3 mb-3 text-body-secondary">&copy; 2017–2023</p>
          </main>
    </div>
</div>

@endsection
