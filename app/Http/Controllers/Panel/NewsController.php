<?php

namespace App\Http\Controllers\Panel;

use App\Models\News;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DatatableRequest;
use App\Http\Requests\Panel\NewsRequest;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->datatable(new DatatableRequest($request));
        }

        return view('panel.news.index');
    }

    public function datatable(DatatableRequest $request)
    {
        $news = News::with('author')
                    ->latest()
                    ->paginate($request->per_page, ['*'], 'page', $request->page);

        $total = $news->total();
        $news  = $news->map(fn($item) => [
            $item->id,
            view('panel.news.datatable.image', compact('item'))->render(),
            $item->author->name,
            $item->name,
            $item->description,
            view('panel.news.datatable.actions', compact('item'))->render(),
        ]);

        return $request->jsonResponse($total, $news);
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
            $image    = $request->file('image');
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
            unlink(public_path('storage/uploads/' . $news->image));
            $image    = $request->file('image');
            $filename = Str::random(30) . '.' . strtolower($image->getClientOriginalExtension());
            $image->storeAs('/public/uploads/', $filename);
            $data['image'] = $filename;
        }

        $news->update($data);

        return to_route('panel.news.index');
    }

    public function destroy(News $news)
    {
        unlink(public_path('storage/uploads/' . $news->image));

        $news->delete();

        return to_route('panel.news.index');
    }
}
