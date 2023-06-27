@extends('layouts.main')
@section('container')
    {{-- JUMBOTRON --}}
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class=" text-center bg-body-tertiary rounded-3">
        <svg class="bi me-2" width="100" height="100" role="img" aria-label="Bootstrap"><use xlink:href="#love"/></svg>

        @auth
        <h1 class="text-body-emphasis">Welcome Home {{ auth()->user()->name }}, Senpai</h1>
        @else
        <h1 class="text-body-emphasis">Welcome and enjoy</h1>
        @endauth
        <p class="col-lg-8 mx-auto fs-5 text-muted">
            A responsive WEB (not Weeb) with Fullstack implement, all by one maintainer. A movement to embrace the future, where the future is the web.
        </p>
        <div class="d-inline-flex gap-2 mb-5">
            <a class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" href="/posts">Explore</a>
        </div>
        </div>
    </div>


    {{-- HERO SECTION --}}
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="px-4 pt-5 my-5 text-center border-bottom">
            <h1 class="display-4 fw-bold text-body-emphasis">Made with love <svg class="bi me-2" width="40" height="52" role="img" aria-label="Bootstrap"><use xlink:href="#love"/></svg></h1>
            <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">With boundless love and relentless hard work, we shape every detail with care to create extraordinary experiences that have the power to transform the world into a more beautiful place. </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Primary button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
            </div>
            </div>
            <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="img/hero-logo.jpg" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
            </div>
            </div>
        </div>
    </div>

    {{-- Hero form section --}}
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">What are you waiting for? Come and join us!</h1>
                    <p class="col-lg-10 fs-4">Join us and become part of the developer team! Your contribution means a lot to us.</p>
                </div>
                @auth
                
                @else
                    <div class="col-md-10 mx-auto col-lg-5">
                        <form action="/login" class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="post">
                            @csrf
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
                            <small>Not Registered yet? <a href="/register">Register Now!</a></small>
                            <hr class="my-4">
                            <small class="text-body-secondary">By clicking Log in, you agree to the terms of use.</small>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
@endsection
