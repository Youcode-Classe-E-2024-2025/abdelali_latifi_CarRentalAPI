<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return response()->json($cars);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    public function show($id)
    {
        $car = Car::find($id);
        return response()->json($car);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->update($request->all());
        return response()->json($car);
    }

    public function destroy($id)
    {
        Car::destroy($id);
        return response()->json(null, 204);
    }
}