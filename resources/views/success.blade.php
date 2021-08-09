@extends('layouts.app')

@section('content')

    @include('includes.header')

    <section class="section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="success-container text-center p-5 bg-white">
                        <h1 class="text-uppercase">
                            <i class="fas fa-check-circle text-success"></i>
                            Success
                        </h1>
                        <p>We have received your bookings</p>
                        <p>Your transaction id: @if (session('success')) {{ session('success') }} @endif</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
                    </div>
                 </div>
            </div>
        </div>
    </section>
@endsection