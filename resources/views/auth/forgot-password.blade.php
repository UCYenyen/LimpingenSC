@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')
    <div class="flex flex-col gap-4 min-h-screen overflow-hidden justify-center items-center">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="bg-white rounded-lg shadow-lg p-12 max-w-md">
            @csrf
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-pages.action-button color="blue" textColor="white">
                    {{ __('Email Password Reset Link') }}
                </x-pages.action-button>
            </div>
        </form>
    </div>
@endsection
