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
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'address' => 'nullable|string|max:255',
        'tele' => 'nullable|string|max:20',
        'cin' => 'required|string|max:20|unique:users',
        'birthyear' => 'nullable|integer|min:1900|max:' . date('Y'),
        'isamember' => 'boolean',
    ]);

    // Set the role automatically to 'customer'
    $validatedData['role'] = 'customer';
    $validatedData['password'] = Hash::make($validatedData['password']);

    $user = User::create($validatedData);

    return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
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