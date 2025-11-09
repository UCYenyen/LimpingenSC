@extends('layouts.app')
@section('title', 'Projects')
@section('content')
    <div class="relative overflow-hidden flex flex-col items-center justify-center pt-[15vh]">
        <img src="/images/login/circle-filler.svg" class="absolute bottom-[-30%] left-[-30%] sm:bottom-[-55%] sm:left-[-15%]"
            alt="">
        <img src="/images/login/circle-border.svg" class="absolute bottom-[-25%] left-[-60%] sm:bottom-[-35%] sm:left-[-30%]"
            alt="">
        <img src="/images/login/circle-filler.svg"
            class="absolute top-[-22.5%] right-[-40%] sm:top-[-40%] sm:right-[-20%] rotate-[180deg]" alt="">
        <img src="/images/login/circle-border.svg" class="absolute top-[-25%] right-[-25%] sm:top-[-45%] sm:right-[-10%]"
            alt="">
        <div class="relative z-10 grid grid-col-1 sm:grid-cols-3 mb-12 gap-4 w-[80%] justify-center">
            @foreach ($allProjects as $project)
                <x-pages.project-card>
                    <x-slot:id>
                        {{ $project->id }}
                    </x-slot:id>
                    <x-slot:image_public_id>
                        {{ $project->image_public_id }}
                    </x-slot:image_public_id>
                    <x-slot:alt>
                        {{ $project->name }}
                    </x-slot:alt>
                    <x-slot:name>
                        {{ $project->name }}
                    </x-slot:name>
                    {{ $project->description }}
                </x-pages.project-card>
            @endforeach
        </div>

        <div class="flex flex-col gap-4 justify-center items-center mb-24 w-[80%] relative z-10">
            {{ $allProjects->links() }}
        </div>
    </div>
@endsection
