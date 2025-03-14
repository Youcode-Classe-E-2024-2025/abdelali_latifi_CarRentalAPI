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
    /**
     * @OA\Get(
     *     path="/api/payments",
     *     summary="Get a list of all rentals",
     *     @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        $rentals = Rentals::all();
        return response()->json($rentals);
    }

    /**
     * @OA\Post(
     *     path="/api/payments",
     *     summary="Create a new rental (with payment process)",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="car_id", type="integer"),
     *             @OA\Property(property="from", type="string", format="date"),
     *             @OA\Property(property="to", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Rental created"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
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
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}