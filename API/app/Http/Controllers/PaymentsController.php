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
            'total_price' => 'required|numeric',
        ]);

        unset($validatedData['name'], $validatedData['email'], $validatedData['phone']);

        // Create rental
        $rental = Rentals::create($validatedData);

        // Calculate amount using 'from' / 'to'
        $car = Cars::findOrFail($validatedData['car_id']);
        $amount = Rentals::calculateTotalPrice(
            $validatedData['from'],
            $validatedData['to'],
            $car->daily_rate
        );

        // Stripe setup
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $car->name . ' ' . $car->model,
                        ],
                        // Convert to cents for Stripe
                        'unit_amount' => $amount * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => env('APP_URL') . '/success',
            'cancel_url' => env('APP_URL') . '/cancel',
        ]);

        // Create payment record
        $payment = Payments::create([
            'rental_id' => $rental->id,
            'amount' => $amount,
            'session_id' => $session->id,
        ]);

        return response()->json($payment);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}