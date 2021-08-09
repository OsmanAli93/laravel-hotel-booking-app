@extends('layouts.app')


@section('content')
    <nav id="main-header" class="navbar navbar-dark navbar-expand-lg p-4">
        <div class="container">

            <a class="navbar-brand text-uppercase" href="#">Bravo</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Facilities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest
                    
                    @auth   
                    <li class="nav-item active">
                        <a class="nav-link" href="#">{{ auth()->user()->username }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.bookings') }}">My Bookings</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="d-inline bg-none border-0 bg-transparent text-white text-uppercase font-weight-light">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>

        </div>
    </nav>

    <div id="hero" class="vh-100">
        <div class="container-fluid h-100 px-0">
            <div class="slide-wrapper h-100">
                @for ($i = 0; $i < 3; $i++)
                    <div class="slide h-100 @if($i === 0) {{ 'active' }}@endif" id="slide-{{ $i }}">
                        <div class="slide-inner d-flex justify-content-center align-items-center h-100">
                            <div class="slide-content text-center">
                                <h1>
                                    @php
                                        if ($i === 0) {
                                            echo html_entity_decode('<span>Welcome To</span> Hotel Bravo');
                                        } else if ($i === 1) {
                                            echo html_entity_decode('<span>Best Place To</span> Find Room');
                                        } else {
                                            echo html_entity_decode('<span>Best Place To</span> Relax');
                                        }
                                    @endphp
                                </h1>
                                <p>Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetue</p>
                                <div class="text-center">
                                    <a href="#">Get Started Now</a>
                                    <a href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endfor
            
            </div>
        </div>
        <div class="dots">
            @for ($i = 0; $i < 3; $i++)
                <div class="dot @if ($i === 0) {{ 'active' }} @endif" data-index="{{ $i }}"></div>
            @endfor
        </div>
    </div>

    <div id="calendar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-wrapper">
                        <form action="{{ route('home') }}" method="post" id="check">
                            @csrf
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="check-in" class="sr-only">Check In</label>
                                        <i class="far fa-calendar"></i>
                                        <input type="text" name="check_in" id="check-in" class="form-control datepicker" data-toggle="tooltip" title="Check-in" data-placement="bottom" placeholder="Check-in"> 
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="check-out" class="sr-only">Check Out</label>
                                        <i class="far fa-calendar"></i>
                                        <input type="text" name="check_out" id="check-out" class="form-control datepicker" data-toggle="tooltip" title="Check-out" data-placement="bottom" placeholder="Check-out"> 
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="night" class="sr-only">Night(s)</label>
                                        <i class="far fa-moon"></i>
                                        <input type="text" name="night" id="night" class="form-control" data-toggle="tooltip" title="Night(s)" data-placement="bottom" readonly placeholder="Night(s)" value="" min="1" max="10"> 
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="night" class="sr-only">Adult(s)</label>
                                        <i class="far fa-user"></i>
                                        <input type="text" name="adult" id="adult" class="form-control" data-toggle="tooltip" title="Adult(s)" data-placement="bottom" readonly placeholder="Adult(s)" value="1" min="1" max="10"> 
                                        <div class="input-group-btn-vertical">
                                            <button type="button" class="btn">
                                                <i class="fas fa-caret-up"></i>
                                            </button>
                                            <button type="button" class="btn">
                                                <i class="fas fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="night" class="sr-only">Child(s)</label>
                                        <i class="far fa-kiss-beam"></i>
                                        <input type="text" name="child" id="adult" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Child(s)" readonly placeholder="Child(s)" value="1" min="1" max="10"> 
                                        <div class="input-group-btn-vertical">
                                            <button type="button" class="btn">
                                                <i class="fas fa-caret-up"></i>
                                            </button>
                                            <button type="button" class="btn">
                                                <i class="fas fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-check d-block w-100">Check Availability</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="welcome" class="section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h5>Hotel Bayview</h5>
                        <h1>Welcome To Hotel Bravo</h1>
                        <p>Duis vel nisl lacinia, facilisis in, consectetur leon vestibulum et ullamcorper tortor leon placerat mauris tincidunt ut non velit faucibus nam a pretium sapien nunc quis congue purus nunc feugiat nec purus a ultricies suspendisse in fringilla est sodales dui, non mattis tortor volutpat vitae.</p>
                        <div class="text-center">
                            <a href="" class="btn-details">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 ml-auto">
                    <div class="image">
                        <figure>
                            <img src="{{ asset('images/b.jpg') }}" class="img-fluid" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="rooms" class="section-gap">
        <div class="container">
            <div class="row mb-3 pb-5">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h1 class="font-weight-normal">Our Rooms</h1>
                        <p>These best rooms chosen by our customers</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @if ($rooms->count())
                    @foreach ($rooms as $room)
                        <div class="col-lg-4 mb-5">
                            <div class="room">
                                <figure>
                                    <img src="{{ asset('images/' . $room->room_image) }}" alt="" class="img-fluid">
                                </figure>
                                <div class="room-details">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5>{{ $room->room_name }}</h5>
                                        <span class="price">$ {{ $room->room_price }} <sub>/night</sub></span>
                                    </div>
                                    <p>
                                        <i class="far fa-user mr-2" data-toggle="tooltip" data-placement="bottom" title="Occupancy"></i>
                                        {{ $room->room_occupancy }}
                                    </p>
                                    <p class="room-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{ 'No records were found' }}
                @endif
            </div>
        </div>
    </section>

    <section id="facilites" class="section-gap">
        <div class="container">
            <div class="row mb-3 pb-5">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h1>Our Facilities</h1>
                        <p>Check out our hotel facilities</p>
                    </div>
                </div>
            </div>

            <div class="row">

                @php
                    $title = ['24-hour Reception', 'Room Service', 'Flat Screen TV', 'Gym', 'Free Parking', 'Free Wi-Fi'];

                    $icons = ['fas fa-phone-alt', 'fas fa-home', 'fas fa-tv', 'fas fa-dumbbell', 'fas fa-car', 'fas fa-wifi'];    
                @endphp

                @for ($i = 0; $i < 6; $i++)
                    <div class="col-lg-4">
                        <div class="facilities">
                            <div class="d-flex">
                                <div class="icon mr-4">
                                    <i class="{{ $icons[$i] }}"></i>
                                </div>
                                <div class="desc">
                                    <h3>{{ $title[$i] }}</h3>
                                    <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam deleniti amet quia voluptate laboriosam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    
    @section('scripts')
        <script src="{{ asset('js/home.js') }}"></script>
    @endsection

    @if (session('status'))
        <div class="custom-toast show">
            <div class="toast-inner p-3">
                {{ session('status') }}
            </div>
        </div>
    @endif

@endsection