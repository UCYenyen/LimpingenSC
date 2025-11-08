@extends('layouts.app')
@section('title', 'Admin Project')

@section('content')
    <div class="w-screen min-h-screen flex flex-col items-center justify-center p-8">
        <div class="w-full max-w-7xl">
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-4xl font-bold text-gray-800">Manage Projects</h1>
                    <p class="text-gray-600 mt-2">Total project: {{ $allProjects->total() }}</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.project.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add New Project
                    </a>
                    <a href="/admin"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                        Back to Dashboard
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Image</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Project Name</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Description</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Created By</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($allProjects as $project)
                                <tr class="hover:bg-blue-50 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <img src="/images/projects/{{ $project->image_url }}" alt="{{ $project->name }}"
                                            class="w-20 h-20 object-cover rounded-lg shadow-sm">
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-semibold text-gray-800">{{ $project->name }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm text-gray-600 line-clamp-2 max-w-md">
                                            {{ Str::limit($project->description, 100) }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $project->user->name ?? 'Unknown' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href=""
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this project?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                                </path>
                                            </svg>
                                            <p class="text-gray-500 text-lg font-medium">No projects found</p>
                                            <p class="text-gray-400 text-sm mt-1">Start by adding a new project</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($allProjects->hasPages())
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        {{ $allProjects->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
