@extends('layouts.app')

@section('content')
    
    @include('includes.header')

    <section id="login" class="section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="box">
                        <div class="box-header text-center">
                            <h2>Login</h2>
                        </div>
                        <div class="box-body">

                            @if (session('status'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <p class="mb-0">{{ session('status') }}</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your email">
                                </div>

                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Choose a password">
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="remember-me">
                                        <input type="checkbox" name="remember" id="remember" class="mr-1">
                                        <label for="remember">Remember</label>
                                    </div>
                                    <div class="form-group">
                                        <a href="#">Forgot password</a>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary d-block w-100">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('includes.footer')

@endsection