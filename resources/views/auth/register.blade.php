@extends('layouts.app')


@section('content')
    
    @include('includes.header')

    <section id="register" class="section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="box">
                        <div class="box-header text-center">
                            <h2>Register</h2>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="sr-only">Name</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') border-danger @enderror" placeholder="Your name" value="{{ old('name') }}">

                                    @error('name')
                                        <div class="text-danger mt-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" id="username" class="form-control  @error('username') border-danger @enderror"" placeholder="Your username" value="{{ old('username') }}">

                                    @error('username')
                                        <div class="text-danger mt-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control  @error('email') border-danger @enderror"" placeholder="Your email" value="{{ old('email') }}">

                                    @error('email')
                                        <div class="text-danger mt-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') border-danger @enderror" placeholder="Choose a password">

                                    @error('password')
                                        <div class="text-danger mt-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password" class="sr-only">Confirm password</label>
                                    <input type="password" id="confirm_password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary d-block w-100">Register</button>
                                </div>
                            </form>
                        </div>
                        <div class="box-footer">
                            <p>Have an account ? <a href="#">Log in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.footer')

@endsection