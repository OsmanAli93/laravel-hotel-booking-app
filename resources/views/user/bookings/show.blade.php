@extends('layouts.app')

@section('content')
    
    @include('includes.header')

    <section id="transaction" class="section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="transaction">

                        <table class="table table-striped">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">User ID</th>
                                <th scope="col">Room ID</th>
                                <th scope="col">Customer Token</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Room Qty</th>
                                <th scope="col">Total Night(s)</th>
                                <th scope="col">Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr class="text-center">
                                        <td>{{ $booking->user_id }}</td>
                                        <td>{{ $booking->room_id }}</td>
                                        <td>{{ $booking->customer_token }}</td>
                                        <td>{{ $booking->check_in }}</td>
                                        <td>{{ $booking->check_out }}</td>
                                        <td>{{ $booking->room_qty }}</td>
                                        <td>{{ $booking->total_nights }}</td>
                                        <td>RM {{ $booking->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection