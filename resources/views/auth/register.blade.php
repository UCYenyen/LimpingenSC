@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <x-auth-session-status class="mb-4" :status="session('status')" />
   <div class="relative min-h-screen w-screen overflow-hidden flex flex-col justify-center items-center">
        <img src="/images/login/circle-filler.svg" class="absolute bottom-[-45%] left-[-15%]" alt="">
        <img src="/images/login/circle-border.svg" class="absolute bottom-[-30%] left-[-30%]" alt="">
        <img src="/images/login/circle-filler.svg" class="absolute top-[-25%] right-[-20%] rotate-[180deg]" alt="">
        <img src="/images/login/circle-border.svg" class="absolute top-[-40%] right-[-10%]" alt="">
        <form method="POST" action="{{ route('login') }}" class="bg-white rounded-lg shadow-lg p-12">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label class="form-label small">Email</label>
                <input type="email" name="email" class="form-control input-underline" :value="old('email')" required
                    autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label small">Password</label>
                <input type="password" name="password" class="form-control input-underline" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                <label class="form-check-label small" for="remember_me">
                    {{ __('Remember me') }}
                </label>
            </div>

            <button type="submit" class="login-btn w-100 py-2 text-white">Login</button>

            <p class="text-center mt-3 mb-0">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="fw-semibold"
                        style="color:#5D71D6; text-decoration:underline;">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </p>

            <p class="text-center mt-2 mb-0">
                Don't have an account?
                <a href="{{ route('register') }}" class="fw-semibold" style="color:#5D71D6; text-decoration:underline;">
                    Register now
                </a>
            </p>
        </form>
    </div>
@endsection
