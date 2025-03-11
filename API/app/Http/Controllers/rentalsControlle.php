<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rentals;

class rentalsControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = rentals::all();
        return response()->json($rentals);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rental = rentals::create($request->all());
        return response()->json($rental, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rental = rentals::find($id);
        return response()->json($rental);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rental = rentals::find($id);
        $rental->update($request->all());
        return response()->json($rental);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $rental = rentals::destroy($id);
        return response()->json(null, 204);
    }
}
