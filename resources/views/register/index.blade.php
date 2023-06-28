@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">

        <main class="form-signin w-100 m-auto">
            <div class="d-flex justify-content-center mt-5">
                {{-- <img class="mb-4" src="/img/iqbal.jpg" alt="" width="200" height="150"> --}}
                <svg class="bi me-2" width="200" height="150" role="img" aria-label="Bootstrap"><use xlink:href="#love"/></svg>
            </div>
            <h1 class="h3 mb-5 mt-3 fw-normal text-center">Please Register</h1>
            <form class="mb-2" action="/register" method="post">
                @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
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
              <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
            </form>
            <small>Already Registered? <a href="/login">Login Now!</a></small>
            <p class="mt-3 mb-3 text-body-secondary">&copy; 2017–2023</p>
          </main>
    </div>
</div>

@endsection
