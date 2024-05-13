<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> ['required', 'string']
        ]);

        Category::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json([
            'status' => 'succes',
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'title'=> ['required', 'string']
        ]);

        $category->update($data);

        return response()->json([
            'status' => 'succes',
            'data' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'status' => 'deleted successfully'
        ]);
    }
}
