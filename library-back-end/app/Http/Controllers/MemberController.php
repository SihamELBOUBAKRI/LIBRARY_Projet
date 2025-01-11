<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member=Member::all();
        return response()->json($member);
    }

    public function show($id)
    {
        // Fetch the author by ID
        $member = Member::find($id);

        // Check if the author exists
        if ($member) {
            return response()->json($member);
        } else {
            return response()->json(['message' => 'member not found'], 404);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id', // Ensure the customer exists
            'cin' => 'required|string|unique:members,cin',
            'gender' => 'nullable|in:male,female',
            'birthday' => 'nullable|date',
        ]);
    
        // Find the customer by their ID
        $customer = Customer::find($validated['customer_id']);
    
        // Update the is_member flag to true
        $customer->is_member = true;
        $customer->save(); // Save the updated customer record
    
        // Create the member for the customer
        $member = Member::create([
            'customer_id' => $customer->id,
            'cin' => $validated['cin'],
            'gender' => $validated['gender'],
            'birthday' => $validated['birthday'],
            'membership_start_date' => now(), // Set membership_start_date to current date
            'membership_end_date' => null,
        ]);
    
        return response()->json([
            'message' => 'Member created successfully!',
            'customer' => $customer,
            'member' => $member,
        ], 200); // You can return 200 OK since the member is being created, not a new resource creation
    }
    


   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
