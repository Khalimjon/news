<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return News::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();

        News::create($data);

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return response()->json([
            'status' => 'succes',
            'data' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $news->update($request->validated());

        return response()->json([
            'status' =>'success',
            'data' => $news
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return response()->json([
            'status' => 'succesfully deleted'
        ]);
    }
}
