<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rentals;

class RentalController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/rentals",
     *     summary="Get a list of all rentals",
     *     @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        // ...existing code...
        $rentals = Rentals::all();
        return response()->json($rentals);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ...existing code...
    }

    /**
     * @OA\Post(
     *     path="/api/rentals",
     *     summary="Create a new rental",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="car_id", type="integer"),
     *             @OA\Property(property="user_id", type="integer"),
     *             @OA\Property(property="from", type="string", format="date"),
     *             @OA\Property(property="to", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Rental created"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(Request $request)
    {
        // ...existing code...
        $rental = Rentals::create($request->all());
        return response()->json($rental, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/rentals/{id}",
     *     summary="Get details of a specific rental",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Rental ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="OK"),
     *     @OA\Response(response=404, description="Rental not found")
     * )
     */
    public function show(string $id)
    {
        // ...existing code...
        $rental = Rentals::find($id);
        return response()->json($rental);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // ...existing code...
    }

    /**
     * @OA\Put(
     *     path="/api/rentals/{id}",
     *     summary="Update an existing rental",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Rental ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="car_id", type="integer"),
     *             @OA\Property(property="user_id", type="integer"),
     *             @OA\Property(property="from", type="string", format="date"),
     *             @OA\Property(property="to", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Updated"),
     *     @OA\Response(response=404, description="Rental not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(Request $request, string $id)
    {
        // ...existing code...
        $rental = Rentals::find($id);
        $rental->update($request->all());
        return response()->json($rental);
    }

    /**
     * @OA\Delete(
     *     path="/api/rentals/{id}",
     *     summary="Delete a rental",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Rental ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="No Content"),
     *     @OA\Response(response=404, description="Rental not found")
     * )
     */
    public function destroy(string $id)
    {
        // ...existing code...
        Rentals::destroy($id);
        return response()->json(null, 204);
    }
}