<?php

namespace App\Http\Controllers;

use App\Events\NewsCreated;
use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Jobs\ChangeNews;
use App\Jobs\UploadBigFile;
use GuzzleHttp\Psr7\UploadedFile;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', [
            'items' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        if($request->file('photo')){
            $path = $request->file('photo')->store('news');
        }

        $newsData = $request->validated();
        $newsData['photo'] = $path ?? null;

        // Create a new News instance
        $news = News::create($newsData);

        NewsCreated::dispatch($news);

        // Dispatch the ChangeNews job with the News instance
        ChangeNews::dispatch($news);

        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', [
            'item' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', ['item' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $news->update($request->validated());

        return redirect()->route('admin.news.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index');
    }
}
