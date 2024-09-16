@extends('layouts.app')

@section('title', "My news index")

@section('content')
    <div class="my-5">
        @foreach($news as $item)
            <a href="{{ route('news.show', $item) }}" class="text-black text-decoration-none">
                <div class="w-50 mb-4 bg-light border border-1 border-secondary shadow-sm rounded-4 p-3">
                    <h4>Title: {{ $item->name }}</h4>
                    <div class="w-50 mx-auto my-3">
                        <img class="img-fluid" src="{{ $item->image }}" alt="image">
                    </div>
                    <p class="text-end text-secondary">Created at: {{ $item->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </a>
        @endforeach
        {{ $news->links() }}
    </div>
@endsection
