@extends('layouts.app')
@section('title', 'Request Detail')

@section('content')
<div class="w-screen min-h-screen pt-[10vh] flex flex-col items-center justify-center p-8">
    <div class="w-full max-w-4xl">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold text-gray-800">Request Details</h1>
                <p class="text-gray-600 mt-2">Request #{{ $request->id }}</p>
            </div>
            <a href="/admin-request" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors duration-200">
                Back to Requests
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- User Information -->
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">User Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Name</p>
                        <p class="text-lg font-medium text-gray-900">{{ $request->user->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="text-lg font-medium text-gray-900">{{ $request->user->email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Phone</p>
                        <p class="text-lg font-medium text-gray-900">{{ $request->user->phone_number ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Package Information -->
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Package Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Package Name</p>
                        <p class="text-lg font-medium text-gray-900">{{ $request->package->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Price</p>
                        <p class="text-lg font-medium text-gray-900">Rp {{$request->package->price}}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-600">Package Description</p>
                        <p class="text-base text-gray-700 mt-1">{{ $request->package->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Request Details -->
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Request Details</h2>
                <div class="mb-4">
                    <p class="text-sm text-gray-600">Status</p>
                    @php $status = strtolower($request->status ?? 'pending'); @endphp
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($status === 'ongoing' ? 'bg-blue-100 text-blue-800' : ($status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800')) }}">
                        {{ ucfirst($status) }}
                    </span>
                </div>
                <div>
                    <p class="text-sm text-gray-600 mb-2">Description</p>
                    <p class="text-base text-gray-700 whitespace-pre-line">{{ $request->description }}</p>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="p-6 bg-gray-50">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-600">Created At</p>
                        <p class="text-gray-900">{{ $request->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Last Updated</p>
                        <p class="text-gray-900">{{ $request->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Action Button -->
            <div class="p-6 flex justify-end">
                <a href="{{ route('admin.request.edit', $request->id) }}" 
                   class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                    Edit Request
                </a>
            </div>
        </div>
    </div>
</div>
@endsection