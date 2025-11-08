@extends('layouts.app')
@section('title', 'Projects')
@section('content')
    <div class="flex flex-col items-center justify-center pt-[15vh]">
        <div class="grid grid-col-1 sm:grid-cols-3 mb-12 gap-4 w-[80%] justify-center">
            @foreach ($allProjects as $project)
            <x-pages.project-card>
                    <x-slot:id>
                        {{ $project->id }}
                    </x-slot:id>
                    <x-slot:name>
                        {{ $project->name }}
                    </x-slot:name>
                    <x-slot:src>
                        {{ $project->image_url }}
                    </x-slot:src>
                    {{ $project->description }}
                </x-pages.project-card>
            @endforeach
        </div>

        <div class="mb-24 w-[80%]">
            {{ $allProjects->links() }}
        </div>
    </div>
@endsection