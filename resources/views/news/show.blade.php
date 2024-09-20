@extends('layouts.app')

@section('title', "My news index")

@section('content')
    <div class="">
        <a href="{{ route('news.index') }}" class="text-decoration-none fs-5">News</a> /
        <span>{{ $item->name }}</span>
    </div>
    <div class="my-5 bg-light border border-1 border-secondary p-3 rounded-4">
        <div class="w-50 mx-auto my-3">
            <img class="img-fluid" src="{{ url("uploads/$item->image") }}" alt="image">
        </div>
        <h1>Title: {{ $item->name }}</h1>
        <h4>Author: {{ $item->author->name }}</h4>
        <hr>
        <p>Description: {{ $item->description }}</p>
    </div>
@endsection
