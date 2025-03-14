<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Payments;
use App\Models\Rentals;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class PaymentsController extends Controller
{
    public function index()
    {
        $rentals = Rentals::all();
        return response()->json($rentals);
    }
    
    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            // Remove rental_id if creating a new rental
            'car_id' => 'required|exists:cars,id',
            'from' => 'required|date',
            'to' => 'required|date|after:from',
        ]);

        $car = Cars::find($validatedData['car_id']);
        $rental = new Rentals();
        $rental->car_id = $car->id;
        $rental->from = $validatedData['from'];
        $rental->to = $validatedData['to'];
        $rental->total_price = $car->price_per_day * $rental->getDays();
        $rental->save();
    }
    catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }
}
}