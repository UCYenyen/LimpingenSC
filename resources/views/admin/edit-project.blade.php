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
                    <form action="{{ route('admin.project.update', $project->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Project Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ $project->name }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Enter project name" required>
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Description <span class="text-red-500">*</span>
                            </label>
                            <textarea id="description" name="description" rows="6"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Enter project description" required>{{ $project->description }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                                Project Image
                            </label>
                            
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                                <div class="relative inline-block">
                                    <img src="{{ $project->image_url }}" alt="{{ $project->name }}"
                                        class="w-48 h-48 object-cover rounded-lg shadow-md" id="currentImage">
                                    
                                    @if($project->image_public_id !== 'No_Image_Available_zt8dja')
                                        <button type="button" onclick="confirmDeleteImage()"
                                            class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white rounded-full p-2 shadow-lg transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>

                            <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                                Upload New Image (optional):
                            </label>
                            <input type="file" id="image" name="image"
                                accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                onchange="previewImage(event)">
                            <p class="mt-1 text-sm text-gray-500">Leave empty to keep current image</p>
                            @error('image')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
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
                    
                    {{-- Hidden form for deleting image --}}
                    <form id="deleteImageForm" action="{{ route('admin.project.delete-image', $project->id) }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('currentImage').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
        
        function confirmDeleteImage() {
            if (confirm('Are you sure you want to delete this image? The image will be replaced with a placeholder. This action cannot be undone.')) {
                document.getElementById('deleteImageForm').submit();
            }
        }
    </script>
@endsection
