@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <link href="/css/home.css" rel="stylesheet">
    {{-- hero mobile --}}
    <div class="flex md:hidden justify-center min-h-screen items-center">
        <div class="flex flex-col h-[80vh] w-screen overflow-x-hidden justify-between items-center relative">
            <div class="w-full h-full text-5xl flex flex-col gap-4 justify-center items-center">
                <h1 class="w-full text-center">We Create</h1>
                <h1 class="w-full text-center"><span class="font-bold">Websites</span> and</h1>
                <h1 class="w-full text-center font-bold">Applications</h1>
            </div>
            <div class="flex justify-center items-center gap-4">
                <img src="/images/home/scroll-down.svg" draggable="false" class="shadow-lg rounded-full md:w-30 w-14 h-auto"
                    width="80" height="80" alt="">
                <h3 class="text-black fs-4">Scroll Down</h3>
            </div>
        </div>
    </div>

    <div class="hidden md:flex justify-center items-center min-h-screen w-screen overflow-x-hidden">
        <div class="flex flex-col h-screen py-[5%] basis-1/2 overflow-x-hidden justify-between items-center relative">
            <div class="w-full h-full text-5xl flex flex-col gap-4 justify-center items-center">
                <h1 class="w-full text-center">We Create</h1>
                <h1 class="w-full text-center"><span class="font-bold">Websites</span> and</h1>
                <h1 class="w-full text-center font-bold">Applications</h1>
            </div>
            <div class="flex justify-center items-center gap-4">
                <img src="/images/home/scroll-down.svg" draggable="false" class="shadow-[0_1px_10px_rgba(0,0,0,0.2)] rounded-full md:w-20 w-14 h-auto"
                    width="80" height="80" alt="">
                <h3 class="text-black text-2xl font-semibold">Scroll Down</h3>
            </div>
        </div>
        <img src="/images/home/home-dekstop-hero.webp" class="basis-1/2 h-screen object-cover w-full" alt="limpingen hero" draggable="false">
    </div>

     <x-pages.about></x-pages.about>

    {{-- services --}}
    <div class="flex flex-col mt-24 justify-center items-center gap-4">
        <h2 class="font-bold w-[80%] md:w-full text-center text-4xl">We Provide the Best Services</h2>
        <div
            class="services-card-container w-[80%] justify-items-center grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($allServices as $service)
                <div class="">
                    <x-pages.service-card>
                        <x-slot:service_type>
                            {{ $service->name }}
                        </x-slot:service_type>
                        {{ $service->description }}
                    </x-pages.service-card>
                </div>
            @endforeach
        </div>
    </div>

    <div
        class="mt-24 mb-24 d-flex min-vh-100 flex-column align-items-center justify-content-start gap-15 px-4 px-md-8 px-lg-12 w-100 position-relative">
        <h1 class="fs-1 fw-bold text-black">Projects</h1>
        @foreach ($featuredProjects as $project)
            <x-pages.project-card>
                <x-slot:id>
                    {{ $project->id }}
                </x-slot:id>
                <x-slot:src>
                    {{ $project->image_url }}
                </x-slot:src>
                <x-slot:name>
                    {{ $project->name }}
                </x-slot:name>
                {{ $project->description }}
                </x-pages.project>
        @endforeach
        <a href="/projects" class="py-4">
            <h3 class="fw-semibold fs-5 py-3 px-8 btn-blue w-fit rounded-3 text-white ">Show more</h3>
        </a>
    </div>
@endsection