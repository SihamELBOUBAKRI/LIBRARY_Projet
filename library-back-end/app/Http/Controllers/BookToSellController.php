<?php

namespace App\Http\Controllers;

use App\Models\BookToSell;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookToSellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BookToSell=BookToSell::all();
        return response()->json($BookToSell);
    }

    public function show($id)
    {
        // Fetch the author by ID
        $BookToSell = BookToSell::find($id);

        // Check if the author exists
        if ($BookToSell) {
            return response()->json($BookToSell);
        } else {
            return response()->json(['message' => 'BookToSell not found'], 404);
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


