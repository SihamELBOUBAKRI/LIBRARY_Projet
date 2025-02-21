<?php
namespace App\Http\Controllers;

use App\Models\BookToSell;
use Illuminate\Http\Request;

class BookToSellController extends Controller
{
    // Get all books available for sale
    public function index()
    {
        return BookToSell::all();
    }

    // Get a specific book available for sale
    public function show($id)
    {
        return BookToSell::findOrFail($id);
    }

    // Create a new book available for sale
    public function store(Request $request)
    {
        return BookToSell::create($request->all());
    }

    // Update a book available for sale
    public function update(Request $request, $id)
    {
        $book = BookToSell::findOrFail($id);
        $book->update($request->all());
        return $book;
    }

    // Delete a book available for sale
    public function destroy($id)
    {
        BookToSell::destroy($id);
        return response()->noContent();
    }
}