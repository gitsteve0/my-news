@extends('layouts.app')

@section('title', "Register")

@section('content')
    <div class="bg-light my-5 w-25 p-4 mx-auto rounded-4 border border-1 border-secondary shadow">
        <form action="{{ route('register') }}" method="post">
            @method('POST')
            @csrf
            <label for="username">Username</label>
            <input class="w-100" type="text" name="username" placeholder=" Batyr Muhammetnyyazow" id="username">
            <div class="my-4">
                <label for="password">Password</label>
                <input class="w-100" type="text" name="password" placeholder=" ****" id="password">
            </div>
            <div class="mb-4">
                <label for="confirm_password">Confirm password</label>
                <input class="w-100" type="text" name="confirm_password" placeholder=" ****" id="confirm_password">
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>
@endsection
