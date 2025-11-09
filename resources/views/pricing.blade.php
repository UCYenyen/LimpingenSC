@extends('layouts.app')
@section('title', 'Pricing')

@section('content')
    <div class="relative overflow-hidden flex justify-center items-center min-h-screen py-16 md:py-24">
        <img src="/images/login/circle-filler.svg" class="absolute bottom-[-14rem] left-[-30%] sm:bottom-[-32rem] sm:left-[-15%]"
            alt="">
        <img src="/images/login/circle-border.svg" class="absolute bottom-[-10rem] left-[-60%] sm:bottom-[-20rem] sm:left-[-30%]"
            alt="">
        <img src="/images/login/circle-filler.svg"
            class="absolute top-[-14rem] right-[-45%] sm:top-[-25rem] sm:right-[-20%] rotate-[180deg]" alt="">
        <img src="/images/login/circle-border.svg" class="absolute top-[-15rem] right-[-25%] sm:top-[-30rem] sm:right-[-10%]"
            alt="">

        <div class="w-[80%] flex flex-col gap-12 md:gap-16 relative z-10 my-8">
            {{-- Websites Section --}}
            @if($websitePackages->count() > 0)
                <div class="flex flex-col gap-6 md:gap-8">
                    <div class="text-center">
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-2">Websites</h2>
                        <div class="w-20 md:w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($websitePackages as $package)
                            <x-pages.package-card>
                                <x-slot:name>
                                    {{ $package->name }}
                                </x-slot:name>
                                <x-slot:price>
                                    Rp {{ $package->price }}
                                </x-slot:price>
                                {{ $package->description }}
                            </x-pages.package-card>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Mobile Apps Section --}}
            @if($mobileAppPackages->count() > 0)
                <div class="flex flex-col gap-6 md:gap-8">
                    <div class="text-center">
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-2">Mobile Apps</h2>
                        <div class="w-20 md:w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($mobileAppPackages as $package)
                            <x-pages.package-card>
                                <x-slot:name>
                                    {{ $package->name }}
                                </x-slot:name>
                                <x-slot:price>
                                    Rp {{ $package->price }}
                                </x-slot:price>
                                {{ $package->description }}
                            </x-pages.package-card>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Digital Marketing Section --}}
            @if($digitalMarketingPackages->count() > 0)
                <div class="flex flex-col gap-6 md:gap-8">
                    <div class="text-center">
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-2">Digital Marketing</h2>
                        <div class="w-20 md:w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($digitalMarketingPackages as $package)
                            <x-pages.package-card>
                                <x-slot:name>
                                    {{ $package->name }}
                                </x-slot:name>
                                <x-slot:price>
                                    Rp {{ $package->price }}
                                </x-slot:price>
                                {{ $package->description }}
                            </x-pages.package-card>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- E-Commerce Section --}}
            @if($eCommercePackages->count() > 0)
                <div class="flex flex-col gap-6 md:gap-8">
                    <div class="text-center">
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-2">E-Commerce</h2>
                        <div class="w-20 md:w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($eCommercePackages as $package)
                            <x-pages.package-card>
                                <x-slot:name>
                                    {{ $package->name }}
                                </x-slot:name>
                                <x-slot:price>
                                    Rp {{ $package->price }}
                                </x-slot:price>
                                {{ $package->description }}
                            </x-pages.package-card>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
