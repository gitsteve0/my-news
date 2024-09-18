@extends('layouts.app')

@section('title', "Register")

@section('content')
    <div class="bg-light my-5 w-25 p-4 mx-auto rounded-4 border border-1 border-secondary shadow">
        <form action="{{ route('change-password') }}" method="post">
            @method('PUT')
            @csrf
            <label for="old_password">Old password</label>
            <input class="w-100" type="text" name="old_password" placeholder=" ****" id="old_password">
            <div class="mb-4">
                <label for="confirm_password">New password</label>
                <input class="w-100" type="text" name="new_password" placeholder=" ****" id="new_password">
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>
@endsection
