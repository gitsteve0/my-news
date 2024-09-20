<?php

namespace App\Http\Controllers\Panel;

use App\Models\News;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\NewsRequest;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()
                    ->paginate();

        return view('panel.news.index', compact('news'));
    }

    public function create()
    {
        $admins = Admin::select('id', 'name')->get();

        return view('panel.news.create', compact('admins'));
    }

    public function store(NewsRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::random(30) . '.' . strtolower($image->getClientOriginalExtension());
            $image->storeAs('/public/uploads/', $filename);
            $data['image'] = $filename;
        }

        News::create($data);

        return to_route('panel.news.index');
    }

    public function edit(News $news)
    {
        $admins = Admin::select('id', 'name')->get();

        return view('panel.news.edit', compact('news', 'admins'));
    }

    public function update(NewsRequest $request, News $news)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            unlink(public_path('storage/uploads/'.$news->image));
            $image = $request->file('image');
            $filename = Str::random(30) . '.' . strtolower($image->getClientOriginalExtension());
            $image->storeAs('/public/uploads/', $filename);
            $data['image'] = $filename;
        }

        $news->update($data);

        return to_route('panel.news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return to_route('panel.news.index');
    }
}
