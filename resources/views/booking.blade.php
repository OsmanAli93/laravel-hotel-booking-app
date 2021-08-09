@extends('layouts.app')

@section('content')
    
    @include('includes.header')

    <section id="booking" class="section-gap">
        <div class="container">
            <div class="row mb-5 pb-5">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h1>Room Reservation</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    @if ($rooms->count())
                        @foreach ($rooms as $room)
                            <div class="room-type-block mb-3">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="room-img">
                                            <img src="{{ asset('images/' . $room->room_image) }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="room-desc">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="room-name">{{ $room->room_name }}</h4>
                                                    <p class="room-text">All our rooms are fully air-conditioned, complimentary WIFI connectivity and Flat screen LED TV designed to provide our in house guests with a comfortable and restful night sleep.</p> 
                                                    <div class="d-flex justify-content-between">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <i class="fas fa-check-circle"></i>
                                                                Free Wi-Fi
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-circle"></i>
                                                                Bath Ameneties
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-circle"></i>
                                                                Heater
                                                            </li>
                                                        </ul>

                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <i class="fas fa-check-circle"></i>
                                                                Free Wi-Fi
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-circle"></i>
                                                                Bath Ameneties
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-circle"></i>
                                                                Heater
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="room-price">
                                                        <h3>RM {{ $room->room_price }} <span>/night</span></h3>
                                                        <div class="room-counter-btn">
                                                            <div class="form-group">
                                                                <label for="label">No. of Room</label>
                                                                <div class="room-count-btn">
                                                                    <input type="text" class="form-control bg-white" id="qty_{{ $room->id }}" readonly min="1" value="1">
                                                                    <div class="room-btn-vertical">
                                                                        <button type="button" class="count up" id="{{ $room->id }}">
                                                                            <i class="fas fa-caret-up fa-x2"></i>
                                                                        </button>
                                                                        <button type="button" class="count down" id="{{ $room->id }}">
                                                                            <i class="fas fa-caret-down fa-x2"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="room_{{ $room->id }}" value="{{ $room->room_available }}">
                                                        <input type="hidden" id="name_{{ $room->id }}" value="{{ $room->room_name }}">
                                                        <input type="hidden" id="price_{{ $room->id }}" value="{{ $room->room_price }}">
                                                        <input type="hidden" id="amount_{{ $room->id }}" value="{{ $room->room_price }}">
                                                        <button type="button" class="btn btn-dark btn-book d-block w-100" id="{{ $room->id }}">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- END --}}
                        @endforeach
                    @else
                        No record found
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="room-summary">
                        <h3>Room booking summary</h3>
                        <div class="summary-details p-3">
                            <div class="detail">
                                <span>Check-in Date</span>
                                <span class="check-in">@if (session('date')) {{ session('date')['check_in'] }} @endif</span>
                            </div>
                            <div class="detail">
                                <span>Check-out Date</span>
                                <span class="check-out">@if (session('date')) {{ session('date')['check_out'] }} @endif</span>
                            </div>
                            <div class="detail">
                                <span>Night(s)</span>
                                <span class="night">@if (session('date')) {{ session('date')['night'] }} @endif</span>
                            </div>
                            <div class="detail">
                                <span>Adult(s)</span>
                                <span class="adult">@if (session('date')) {{ session('date')['adult'] }} @endif</span>
                            </div>
                            <div class="detail">
                                <span>Child(s)</span>
                                <span class="child">@if (session('date')) {{ session('date')['child'] }} @endif</span>
                            </div>
                            <h4>Room Selected</h4>
                            <table id="summarySelectedRoom" class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>Room Type</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-right">Amount</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody id="bookingDetails"></tbody>
                            </table>
                            <div class="summarySubTotal mb-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="text-danger total">Total (RM)</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span id="total" class="text-danger">0.00</span>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('booking') }}" method="post" id="formIndex">
                                @csrf
                                <div class="text-right">
                                    <button type="submit" id="btn-next" class="btn d-block w-50 ml-auto btn-next">Next Step</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('scripts')
    <script src="{{ asset('js/booking.js') }}"></script>
    @endsection

@endsection