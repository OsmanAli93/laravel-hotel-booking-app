<?php

namespace App\Http\Controllers;

use Stripe;
use Stripe\Charge;
use App\Models\Room;
use Stripe\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index ()
    {
        return view('payment');
    }

    public function success ()
    {
        return view('success');
    }

    public function store (Request $request)
    {
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
        $dates = session('date');
        $bookings = session('bookings');
    
        // Create Stripe customer
        $customer = Stripe\Customer::create([
            "email" => auth()->user()->email,
            "source" => $request->stripeToken,
        ]);

        // Create Stripe charge
        for ( $i = 0; $i < count($bookings['room_type_id']); $i++ ) {

            $charge = Stripe\Charge::create ([

                "amount" => (int)$bookings['room_type_amount'][$i] * (int)$bookings['room_type_amount'][$i],
                "currency" => "MYR",
                "description" => "Hotel booking for Room " . $bookings['room_type_id'][$i],
                "customer" => $customer->id,
            ]);
        }

        // Create Booking
        for ( $i = 0; $i < count($bookings['room_type_id']); $i++ ) {

            $request->user()->bookings()->create([
                'room_id' => $bookings['room_type_id'],
                'customer_token' => $customer->id,
                'room_id' => $bookings['room_type_id'][$i],
                'check_in' => $dates['check_in'],
                'check_out' => $dates['check_out'],
                'room_qty' => $bookings['room_type_qty'][$i],
                'total_nights' => $dates['night'],
                'amount' => $bookings['room_type_amount'][$i]
            ]);

            Transaction::create([
                'transaction_token' => $charge->id,
                'customer_token' => $customer->id,
                'product' => 'Booking for Room' . $bookings['room_type_id'][$i],
                'amount' => $bookings['room_type_amount'][$i],
                'currency' => 'MYR',
                'status' => 'success',
            ]);
        }
        

        // Update Room 
        $rooms = Room::find($bookings['room_type_id']);

        for ( $i = 0; $i < count($rooms); $i++ ) {
            
            $rooms[$i]->decrement('room_available', $bookings['room_type_qty'][$i]);

            
        }

        session()->forget('date');
        session()->forget('bookings');
        
        return redirect()->route('success')->with('success', $charge->id);
    }
}
