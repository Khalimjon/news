<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){

        $latest = News::latest()->limit(6)->get();
        $actual = News::whereRelation('category', 'id', 2)->limit(4)->get();
        $featured = News::whereRelation('category', 'id', 1)->limit(5)->get();
        $main =News::latest()->limit(4)->get();

        return view('home', [
            'latest' => $latest,
            'actual' => $actual,
            'featured' => $featured,
            'main' => $main
        ]);
    }

    public function category(){

        $latest = News::latest()->limit(4)->get();
        $actual = News::latest()->limit(8)->get();


        return view('category', [
            'latest' => $latest,
            'actual' => $actual,

        ]);
    }

    public function singleNews(News $news){
        return view('singleNews', [
            'item' => $news

        ]);
    }


    public function contact(){
        return view('contact');
    }

}
