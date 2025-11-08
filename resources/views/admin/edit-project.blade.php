@extends('layouts.app')
@section('title', 'Edit Project')

@section('content')
    <div class="flex justify-center items-center">
        <div class="w-screen min-h-screen justify-center max-w-7xl flex flex-col items-center p-8">
            <div class="w-full max-w-2xl">
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-gray-800 text-center">Edit Project</h1>
                </div>


                <div class="bg-white rounded-lg shadow-lg p-8">
                    <form action="{{ route('admin.project.update', $project->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Project Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{  $project->name }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Enter project name" required>
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Description <span class="text-red-500">*</span>
                            </label>
                            <textarea id="description" name="description" rows="6"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Enter project description" required>{{  $project->description }}</textarea>
                        </div>

                        <div class="flex gap-3 justify-end">
                            <a href="/admin-project"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                                Update Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection