@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="relative min-h-screen w-screen overflow-hidden flex flex-col justify-center items-center">
        <img src="/images/login/circle-filler.svg" class="absolute bottom-[-45%] left-[-15%]" alt="">
        <img src="/images/login/circle-border.svg" class="absolute bottom-[-30%] left-[-30%]" alt="">
        <img src="/images/login/circle-filler.svg" class="absolute top-[-25%] right-[-20%] rotate-[180deg]" alt="">
        <img src="/images/login/circle-border.svg" class="absolute top-[-40%] right-[-10%]" alt="">
        <form method="POST" action="{{ route('login') }}" class="bg-white rounded-lg shadow-lg p-12">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center flex-col justify-end mt-4 gap-4">
                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="/register">
                    {{ __('Already have an account? Register here') }}
                </a>
            </div>
        </form>
    </div>
@endsection
