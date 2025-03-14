<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Cars::all();
        return response()->json($cars);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $car = Cars::create($request->all());
        return response()->json($car, 201);
    }

    public function show($id)
    {
        $car = Cars::find($id);
        return response()->json($car);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $car = Cars::find($id);
        $car->update($request->all());
        return response()->json($car);
    }

    public function destroy($id)
    {
        Cars::destroy($id);
        return response()->json(null, 204);
    }
}