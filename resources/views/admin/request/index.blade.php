@extends('layouts.app')
@section('title', 'Admin Request Management')

@section('content')
    <div class="w-screen min-h-screen pt-[10vh] md:pt-[7vh] flex flex-col items-center justify-center p-4 md:p-8">
        <div class="mb-6 flex flex-col md:flex-row max-w-6xl w-full justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl md:text-4xl font-bold text-gray-800">Manage Requests</h1>
                <p class="text-sm md:text-base text-gray-600 mt-2">Total requests: {{ $allRequests->total() }}</p>
            </div>
            <a href="/admin"
                class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors duration-200 text-sm md:text-base whitespace-nowrap">
                Back to Dashboard
            </a>
        </div>
        <div class="w-full max-w-6xl">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Mobile View (Cards) -->
                <div class="block md:hidden">
                    @forelse ($allRequests as $request)
                        <div class="border-b border-gray-200 p-4 hover:bg-blue-50 transition-colors duration-150">
                            <!-- User Info -->
                            <div class="mb-3">
                                <p class="text-xs text-gray-500 mb-1">User</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $request->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $request->user->email }}</p>
                            </div>

                            <!-- Package Info -->
                            <div class="mb-3">
                                <p class="text-xs text-gray-500 mb-1">Package</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $request->package->name }}</p>
                                <p class="text-xs text-gray-500">Rp {{ $request->package->price }}</p>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <p class="text-xs text-gray-500 mb-1">Description</p>
                                <p class="text-sm text-gray-600">
                                    {{ Str::limit($request->description, 80) }}
                                </p>
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <p class="text-xs text-gray-500 mb-1">Status</p>
                                @php $status = strtolower($request->status ?? 'pending'); @endphp
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium shadow-md {{ $status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($status === 'ongoing' ? 'bg-blue-100 text-blue-800' : ($status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800')) }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </div>

                            <!-- Actions -->
                            <div class="flex gap-2 mt-4">
                                <x-pages.action-link href="{{ route('request-detail', $request->id) }}" color="blue">
                                    View
                                </x-pages.action-link>
                                <x-pages.action-link href="{{ route('admin.request.edit', $request->id) }}"
                                    color="yellow">
                                    Edit
                                </x-pages.action-link>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <p class="text-gray-600 font-medium">No requests found</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Desktop View (Table) -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold">User</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Package</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Description</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Status</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($allRequests as $request)
                                <tr class="hover:bg-blue-50 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-semibold text-gray-800">{{ $request->user->name }}</span>
                                        <br>
                                        <span class="text-xs text-gray-500">{{ $request->user->email }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="text-sm font-semibold text-gray-800">{{ $request->package->name }}</span>
                                        <br>
                                        <span class="text-xs text-gray-500">Rp
                                            {{ $request->package->price }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm text-gray-600 line-clamp-2 max-w-md">
                                            {{ Str::limit($request->description, 100) }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php $status = strtolower($request->status ?? 'pending'); @endphp
                                        <span
                                            class="inline-flex items-center px-2 py-1 rounded-full text-sm font-medium shadow-md {{ $status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($status === 'ongoing' ? 'bg-blue-100 text-blue-800' : ($status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800')) }}">
                                            {{ ucfirst($status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <x-pages.action-link href="{{ route('request-detail', $request->id) }}" color="blue">
                                                View
                                            </x-pages.action-link>
                                            <x-pages.action-link href="{{ route('admin.request.edit', $request->id) }}"
                                                color="yellow">
                                                Edit
                                            </x-pages.action-link>
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
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <p class="text-gray-600 font-medium">No requests found</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($allRequests->hasPages())
                    <div class="flex justify-end px-4 md:px-6 py-4 bg-gray-50">
                        {{ $allRequests->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
