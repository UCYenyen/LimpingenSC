@extends('layout.app')
@section('title', 'Pricing')

@section('content')
    <div style="width:100vw; height:15vh;"></div>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh">
        <div class="row mb-24 row-cols-1 row-cols-md-3 gap-4 justify-content-center" style="">
            @foreach ($allPackages as $package)
                <x-packages-card>
                    <x-slot:name>
                        {{ $package->name }}
                    </x-slot:name>
                    <x-slot:price>
                        {{ $package->price }}
                    </x-slot:price>
                    {{ $package->description }}
                </x-packages-card>
            @endforeach
        </div>
    </div>
@endsection
