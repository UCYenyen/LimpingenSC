@extends('layouts.app')
@section('title', 'Pricing')

@section('content')
    <div class="w-screen h-[15vh]"></div>
    <div class="flex justify-center items-center min-h-[80vh]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-24 justify-items-center">
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
