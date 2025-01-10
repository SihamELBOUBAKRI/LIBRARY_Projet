<?php

namespace App\Http\Controllers;

use App\Models\BookToRent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookToRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BookToRent=BookToRent::all();
        return response()->json($BookToRent);
    }

    public function show($id)
    {
        // Fetch the author by ID
        $BookToRent = BookToRent::find($id);

        // Check if the author exists
        if ($BookToRent) {
            return response()->json($BookToRent);
        } else {
            return response()->json(['message' => 'BookToRent not found'], 404);
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
        //
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

