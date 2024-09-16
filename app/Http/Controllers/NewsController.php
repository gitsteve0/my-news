<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(4);

        return view('news.index', compact('news'));
    }

    public function show(News $item)
    {
        return view('news.show', compact('item'));
    }
}
