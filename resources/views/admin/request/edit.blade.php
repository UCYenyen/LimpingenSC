@extends('layouts.app')
@section('title', 'Edit Request')

@section('content')
<div class="w-screen min-h-screen pt-[10vh] flex flex-col items-center justify-center p-8">
    <div class="w-full max-w-4xl">
        <div class="mb-6">
            <h1 class="text-4xl font-bold text-gray-800">Edit Request</h1>
            <p class="text-gray-600 mt-2">Update request status and details</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="{{ route('admin.request.update', $request->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- User Info (Read-only) -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">User Information</h3>
                    <p class="text-gray-700"><span class="font-medium">Name:</span> {{ $request->user->name }}</p>
                    <p class="text-gray-700"><span class="font-medium">Email:</span> {{ $request->user->email }}</p>
                    <p class="text-gray-700"><span class="font-medium">Package:</span> {{ $request->package->name }}</p>
                    <p class="text-gray-700"><span class="font-medium">Price:</span> Rp {{$request->package->price}}</p>
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" 
                            class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="pending" {{ $request->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="ongoing" {{ $request->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="done" {{ $request->status === 'done' ? 'selected' : '' }}>Done</option>
                        <option value="rejected" {{ $request->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="6"
                              class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Request details...">{{ old('description', $request->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 justify-end">
                    <a href="{{ route('request-detail', $request->id) }}" 
                       class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors duration-200">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                        Update Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection