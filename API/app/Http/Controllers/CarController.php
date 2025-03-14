<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/cars",
     *     summary="Get a paginated list of cars",
     *     @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        $cars = Cars::paginate(5);
        return response()->json($cars);
    }

    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/cars",
     *     summary="Create a new car",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="make", type="string"),
     *             @OA\Property(property="model", type="string"),
     *             @OA\Property(property="year", type="integer")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Created"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(Request $request)
    {
        $car = Cars::create($request->all());
        return response()->json($car, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/cars/{id}",
     *     summary="Get details of a specific car",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Car ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="OK"),
     *     @OA\Response(response=404, description="Car not found")
     * )
     */
    public function show($id)
    {
        $car = Cars::find($id);
        return response()->json($car);
    }

    public function edit($id)
    {
        //
    }

    /**
     * @OA\Put(
     *     path="/api/cars/{id}",
     *     summary="Update an existing car",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Car ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="make", type="string"),
     *             @OA\Property(property="model", type="string"),
     *             @OA\Property(property="year", type="integer")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Updated"),
     *     @OA\Response(response=404, description="Car not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(Request $request, $id)
    {
        $car = Cars::find($id);
        $car->update($request->all());
        return response()->json($car);
    }

    /**
     * @OA\Delete(
     *     path="/api/cars/{id}",
     *     summary="Delete a car",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Car ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="No Content"),
     *     @OA\Response(response=404, description="Car not found")
     * )
     */
    public function destroy($id)
    {
        Cars::destroy($id);
        return response()->json(null, 204);
    }
}