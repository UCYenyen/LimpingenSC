@extends('layouts.app')
@section('title', 'Admin Users Management')

@section('content')
    <div class="w-screen min-h-screen pt-[7vh] flex flex-col items-center justify-center p-8">
        <h1 class="text-4xl font-bold mb-8">User Management</h1>
        <div class="w-full max-w-4xl">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Name</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Email</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Role</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($allUsers as $user)
                                <tr class="hover:bg-blue-50 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-semibold text-gray-800">{{ $user->name }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-gray-600">{{ $user->email }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="text-sm font-medium {{ $user->role === 'admin' ? 'text-red-600' : 'text-green-600' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-600">
                                        No users found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
