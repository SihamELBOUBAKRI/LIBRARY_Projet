<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrackBookPurchase;
use Illuminate\Routing\Controller;

class TrackBookPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TrackBookPurchase=TrackBookPurchase::all();
        return response()->json($TrackBookPurchase);
    }

    public function show($id)
    {
        // Fetch the author by ID
        $TrackBookPurchase = TrackBookPurchase::find($id);

        // Check if the author exists
        if ($TrackBookPurchase) {
            return response()->json($TrackBookPurchase);
        } else {
            return response()->json(['message' => 'TrackBookPurchase not found'], 404);
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

