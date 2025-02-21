<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Get all categories
    public function index()
    {
        return Category::all();
    }

    // Get a specific category
    public function show($id)
    {
        return Category::findOrFail($id);
    }

    // Create a new category
    public function store(Request $request)
    {
        return Category::create($request->all());
    }

    // Update a category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return $category;
    }

    // Delete a category
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->noContent();
    }
}