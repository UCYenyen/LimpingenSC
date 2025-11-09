@extends('layouts.app')
@section('title', 'Admin Pricing')

@section('content')
    <div class="w-screen min-h-screen flex flex-col items-center justify-center p-8">
        <div class="w-full max-w-7xl">
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-4xl font-bold text-gray-800">Manage Pricing</h1>
                    <p class="text-gray-600 mt-2">Total packages: {{ $allPackages->total() }}</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.package.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add New Package
                    </a>
                    <a href="/admin"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                        Back to Dashboard
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Package Name</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Description</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Price</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Service</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($allPackages as $package)
                                <tr class="hover:bg-blue-50 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-semibold text-gray-800">{{ $package->name }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm text-gray-600 line-clamp-2 max-w-md">
                                            {{ Str::limit($package->description, 100) }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-semibold text-green-600">Rp {{ $package->price }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $package->service->name ?? 'Unknown' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <x-pages.action-link href="{{ route('admin.package.edit', $package->id) }}" color="yellow" textColor="white">
                                                Edit
                                            </x-pages.action-link>
                                            <form action="{{ route('admin.package.destroy', $package->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this package?');">
                                                @csrf
                                                @method('DELETE')
                                                <x-pages.action-button color="red" textColor="white">
                                                    Delete
                                                </x-pages.action-button>
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
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                            <p class="text-gray-500 text-lg font-medium">No packages found</p>
                                            <p class="text-gray-400 text-sm mt-1">Start by adding a new package</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($allPackages->hasPages())
                    <div class="flex justify-end bg-gray-50 px-6 py-4 border-t border-gray-200">
                        {{ $allPackages->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection