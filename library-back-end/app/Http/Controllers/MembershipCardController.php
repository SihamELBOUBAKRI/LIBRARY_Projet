<?php
namespace App\Http\Controllers;

use App\Models\MembershipCard;
use Illuminate\Http\Request;

class MembershipCardController extends Controller
{
    // Get all membership cards
    public function index()
    {
        return MembershipCard::all();
    }

    // Get a specific membership card
    public function show($id)
    {
        return MembershipCard::findOrFail($id);
    }

    // Create a new membership card
    public function store(Request $request)
    {
        return MembershipCard::create($request->all());
    }

    // Update a membership card
    public function update(Request $request, $id)
    {
        $card = MembershipCard::findOrFail($id);
        $card->update($request->all());
        return $card;
    }

    // Delete a membership card
    public function destroy($id)
    {
        MembershipCard::destroy($id);
        return response()->noContent();
    }
}