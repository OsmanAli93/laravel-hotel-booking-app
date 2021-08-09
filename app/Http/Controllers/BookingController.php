<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index ()
    {
        
        $rooms = Room::get();

        return view('booking', [
            'rooms' => $rooms
        ]);

    }

    public function show ()
    {
        $bookings = Booking::get();

        return view('user.bookings.show', [
            'bookings' => $bookings
        ]);
    }

    public function store (Request $request)
    {
        $bookings = $request->except('_token');

        session(['bookings' => $bookings]);

        return redirect()->route('payment');
    }
}
