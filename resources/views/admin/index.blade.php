@extends('layouts.app')
@section('title', 'Admin Home')

@section('content')
<div class="w-screen min-h-screen pt-[10vh] sm:pt-[7vh] gap-4 flex flex-col items-center justify-center p-8">
    <h1 class="text-4xl font-semibold max-w-6xl w-full text-start">Welcome, {{$adminName}}</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-6xl">
        <a href="/admin-request" class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 flex flex-col items-center justify-center group">
            <div class="text-blue-600 mb-4">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Request</h3>
            <p class="text-gray-600 mt-2 text-center">Click Here to Manage Request</p>
        </a>

         {{-- <a href="/admin-users" class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 flex flex-col items-center justify-center group">
            <div class="text-blue-600 mb-4">
                <svg class="w-16 h-16 rounded-full border-2 border-gray-200 p-2 bg-white text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 12a4 4 0 100-8 4 4 0 000 8z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 20a8 8 0 0116 0" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Users</h3>
            <p class="text-gray-600 mt-2 text-center">Click Here to Manage Users</p>
        </a> --}}


    
        <a href="/admin-project" class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 flex flex-col items-center justify-center group">
            <div class="text-green-600 mb-4">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">Project</h3>
            <p class="text-gray-600 mt-2 text-center">Click Here to Manage Project</p>
        </a>

        <a href="/admin-pricing" class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 flex flex-col items-center justify-center group">
            <div class="text-purple-600 mb-4">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 group-hover:text-purple-600 transition-colors">Pricing</h3>
            <p class="text-gray-600 mt-2 text-center">Click Here to Manage Pricing</p>
        </a>
    </div>
</div>
@endsection