<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomePageController extends Controller
{ 
    public function index () 
    {
        $rooms = Room::get();

        return view('index', [
            'rooms' => $rooms
        ]);
    }

    public function store (Request $request)
    {
        $bookingDate = $request->except('_token');

        session(['date' => $bookingDate]);

        return redirect()->route('booking');
    }

}
