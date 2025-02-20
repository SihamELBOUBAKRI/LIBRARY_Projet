<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Get all users
    public function index()
    {
        return User::all();
    }

    // Get a specific user
    public function show($id)
    {
        return User::findOrFail($id);
    }

    // Create a new user
    public function store(Request $request)
    {
        return User::create($request->all());
    }

    // Update a user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    }

    // Delete a user
    public function destroy($id)
    {
        User::destroy($id);
        return response()->noContent();
    }
}