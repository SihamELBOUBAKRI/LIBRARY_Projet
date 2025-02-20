<?php
namespace App\Http\Controllers;

use App\Models\ActiveRental;
use Illuminate\Http\Request;

class ActiveRentalController extends Controller
{
    // Get all active rentals
    public function index()
    {
        return ActiveRental::all();
    }

    // Get a specific active rental
    public function show($id)
    {
        return ActiveRental::findOrFail($id);
    }

    // Create a new active rental
    public function store(Request $request)
    {
        return ActiveRental::create($request->all());
    }

    // Update an active rental
    public function update(Request $request, $id)
    {
        $activeRental = ActiveRental::findOrFail($id);
        $activeRental->update($request->all());
        return $activeRental;
    }

    // Delete an active rental
    public function destroy($id)
    {
        ActiveRental::destroy($id);
        return response()->noContent();
    }
}