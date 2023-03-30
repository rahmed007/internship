@extends('layouts.master')
@section('content')
    <div class="my-4 py-4">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="card">
        <div class="card-header">
            <h3>Login</h3>
        </div>
        <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <button type="submit" class="btn btn-info">Login</button>
        </div>
    </form>
    </div>
</div>

</div>
@endsection