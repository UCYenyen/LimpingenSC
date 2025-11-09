@extends('layouts.app')
@section('title', 'Pricing')

@section('content')
    <div class="relative overflow-hidden flex justify-center items-center min-h-screen">
        <img src="/images/login/circle-filler.svg" class="absolute bottom-[-30%] left-[-30%] sm:bottom-[-55%] sm:left-[-15%]"
            alt="">
        <img src="/images/login/circle-border.svg" class="absolute bottom-[-25%] left-[-60%] sm:bottom-[-35%] sm:left-[-30%]"
            alt="">
        <img src="/images/login/circle-filler.svg"
            class="absolute top-[-22.5%] right-[-40%] sm:top-[-40%] sm:right-[-20%] rotate-[180deg]" alt="">
        <img src="/images/login/circle-border.svg" class="absolute top-[-25%] right-[-25%] sm:top-[-45%] sm:right-[-10%]"
            alt="">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-[80%] mt-24 justify-items-center">
            @foreach ($allPackages as $package)
                <x-pages.package-card>
                    <x-slot:name>
                        {{ $package->name }}
                    </x-slot:name>
                    <x-slot:price>
                        {{ $package->price }}
                    </x-slot:price>
                    {{ $package->description }}
                </x-pages.package-card>
            @endforeach
        </div>
    </div>
@endsection
