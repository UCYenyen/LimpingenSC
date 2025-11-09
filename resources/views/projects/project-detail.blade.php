@extends('layouts.app')
@section('title', $project->name)

@section('content')
    <div class="relative overflow-hidden flex min-h-screen flex-col justify-center items-center gap-4 w-full">
        <img src="/images/login/circle-filler.svg" class="absolute bottom-[-30%] left-[-30%] sm:bottom-[-55%] sm:left-[-15%]" alt="">
        <img src="/images/login/circle-border.svg" class="absolute bottom-[-25%] left-[-60%] sm:bottom-[-35%] sm:left-[-30%]" alt="">
        <img src="/images/login/circle-filler.svg" class="absolute top-[-22.5%] right-[-40%] sm:top-[-40%] sm:right-[-20%] rotate-[180deg]" alt="">
        <img src="/images/login/circle-border.svg" class="absolute top-[-25%] right-[-25%] sm:top-[-45%] sm:right-[-10%]" alt="">
        <div class="w-[80%] flex flex-col gap-4">
            <div class="flex gap-3 mt-5">
                <a href="/projects"
                    class="inline-flex items-center px-4 py-2 border border-interactible-primary-active text-white hover:text-interactible-primary-active bg-interactible-primary-active rounded-lg hover:bg-zinc-50 transition-all duration-100">
                    ← Back to Projects
                </a>
            </div>
            <div class="flex flex-col sm:flex-row bg-white shadow-lg rounded-lg overflow-hidden">
                <x-cloudinary::image public-id="{{ $project->image_public_id }}" draggable="false"
                    lass="w-full h-full object-cover object-center" alt="{{ $project->name }}" />
                <div class="p-6 md:p-8 flex flex-col">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ $project->name }}</h1>
                    <p class="text-base md:text-lg text-justify mb-6">{{ $project->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
