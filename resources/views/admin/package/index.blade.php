@extends('layouts.app')
@section('title', 'Admin Pricing')

@section('content')
    <div class="w-screen min-h-screen pt-[10vh] md:pt-[7vh] flex flex-col items-center justify-center p-4 md:p-8">
        <div class="w-full max-w-7xl">
            <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-2xl md:text-4xl font-bold text-gray-800">Manage Pricing</h1>
                    <p class="text-sm md:text-base text-gray-600 mt-2">Total packages: {{ $allPackages->total() }}</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                    <a href="{{ route('admin.package.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 md:px-6 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2 text-sm md:text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add New Package
                    </a>
                    <a href="/admin"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 md:px-6 rounded-lg transition-colors duration-200 text-center text-sm md:text-base">
                        Back to Dashboard
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Mobile View (Cards) -->
                <div class="block md:hidden">
                    @forelse ($allPackages as $package)
                        <div class="border-b border-gray-200 p-4 hover:bg-blue-50 transition-colors duration-150">
                            <!-- Package Name -->
                            <div class="mb-3">
                                <p class="text-xs text-gray-500 mb-1">Package Name</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $package->name }}</p>
                            </div>

                            <!-- Service -->
                            <div class="mb-3">
                                <p class="text-xs text-gray-500 mb-1">Service</p>
                                <p class="text-sm text-gray-700">{{ $package->service->name ?? 'Unknown' }}</p>
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <p class="text-xs text-gray-500 mb-1">Price</p>
                                <p class="text-sm font-semibold text-green-600">Rp {{ $package->price }}</p>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <p class="text-xs text-gray-500 mb-1">Description</p>
                                <p class="text-sm text-gray-600">
                                    {{ Str::limit($package->description, 80) }}
                                </p>
                            </div>

                            <!-- Actions -->
                            <div class="flex gap-2 mt-4">
                                <x-pages.action-link href="{{ route('admin.package.edit', $package->id) }}" color="yellow" textColor="white">
                                    Edit
                                </x-pages.action-link>
                                <form action="{{ route('admin.package.destroy', $package->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this package?');" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <x-pages.action-button color="red" textColor="white">
                                        Delete
                                    </x-pages.action-button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <p class="text-gray-600 font-medium">No packages found</p>
                                <p class="text-gray-400 text-sm mt-1">Start by adding a new package</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Desktop View (Table) -->
                <div class="hidden md:block overflow-x-auto">
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

                <!-- Pagination -->
                @if ($allPackages->hasPages())
                    <div class="px-4 md:px-6 flex justify-end py-4 bg-gray-50 border-t border-gray-200">
                        {{ $allPackages->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection