<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\BookToSell;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Order=Order::all();
        return response()->json($Order);
    }

    public function show($id)
    {
        // Fetch the author by ID
        $Order = Order::find($id);

        // Check if the author exists
        if ($Order) {
            return response()->json($Order);
        } else {
            return response()->json(['message' => 'Order not found'], 404);
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
        // Validate incoming request
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'books' => 'required|array',
            'books.*' => 'exists:book_to_sells,id', // Validate each book ID
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,completed,canceled',
        ]);
    
        // Create the new order in the 'orders' table
        $order = Order::create([
            'customer_id' => $validated['customer_id'],
            'total_price' => $validated['total_price'],
            'status' => $validated['status'],
        ]);
    
        // Insert each book into the 'order_book' pivot table
        $orderBooks = [];
        foreach ($validated['books'] as $bookId) {
            $orderBooks[] = [
                'order_id' => $order->id,   // Reference to the created order
                'book_id' => $bookId,        // Book ID that was ordered
                'created_at' => now(),       // Timestamp for the created_at field
                'updated_at' => now(),       // Timestamp for the updated_at field
            ];
        }
    
        // Bulk insert into the pivot table
        \DB::table('order_book')->insert($orderBooks);
    
        return response()->json([
            'message' => 'Order created successfully!',
            'order' => $order,
        ], 201);
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

