@extends('layouts.app')
@section('title', 'Add New Package')

@section('content')
    <div class="flex justify-center items-center">
        <div class="w-screen min-h-screen justify-center max-w-7xl flex flex-col items-center p-8">
            <div class="w-full max-w-2xl">
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-gray-800 text-center">Add New Package</h1>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-8">
                    <form action="{{ route('admin.package.store') }}" method="POST">
                        @csrf

                        <div class="mb-6">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Package Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Enter package name" required>
                        </div>

                        <div class="mb-6">
                            <label for="service_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                Service Type <span class="text-red-500">*</span>
                            </label>
                            <select id="service_id" name="service_id"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                                <option value="">Select Service</option>
                                @foreach($allServices as $service)
                                    <option value="{{ $service->id }}">
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">
                                Price <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
                                <input type="text" id="price" name="price"
                                    class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="3.000.000" required>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Description <span class="text-red-500">*</span>
                            </label>
                            <textarea id="description" name="description" rows="6"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Enter package description" required></textarea>
                        </div>

                        <div class="flex gap-3 justify-end">
                            <a href="/admin-pricing"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                                Create Package
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection