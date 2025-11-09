@extends('layouts.app')
@section('title', 'Request')

@section('content')
{{-- Using Tailwind CSS --}}
<div class="min-h-screen flex items-center justify-center py-12 bg-gray-50">
    <div class="w-full sm:max-w-2xl bg-white rounded-lg shadow-md overflow-hidden max-w-[90%]">
        <div class="px-6 py-8 md:px-10">
            <h3 class="text-center text-2xl font-semibold mb-6">Request</h3>

            <form action="{{ route('request.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Service Type</label>
                    <select id="serviceSelect" name="service_id"
                            class="block w-full bg-transparent border-b-2 border-gray-200 focus:border-indigo-500 focus:ring-0 py-2 pl-0 text-sm"
                            aria-label="Service type">
                        <option value="">Select service</option>
                        @if(isset($allServices))
                            @foreach($allServices as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Package</label>
                    <select id="packageSelect" name="package_id"
                            class="block w-full bg-transparent border-b-2 border-gray-200 focus:border-indigo-500 focus:ring-0 py-2 pl-0 text-sm"
                            aria-label="Package" disabled>
                        <option value="">Select package</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Request Details</label>
                    <textarea name="description" rows="6"
                              class="block w-full border border-gray-200 rounded-md p-3 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-100"
                              placeholder="Describe your request..."></textarea>
                </div>

                <div>
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-200">
                        Request Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
        document.addEventListener("DOMContentLoaded", function () {
        const serviceSelect = document.getElementById("serviceSelect");
        const packageSelect = document.getElementById("packageSelect");

        if (!serviceSelect || !packageSelect) return;

        serviceSelect.addEventListener("change", function () {
            const serviceId = this.value;

            if (!serviceId) {
                packageSelect.innerHTML =
                    '<option value="">Select package</option>';
                packageSelect.disabled = true;
                return;
            }
            packageSelect.innerHTML = "<option>Loading...</option>";
            packageSelect.disabled = true;

            fetch(`/services/${serviceId}/packages`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then((packages) => {
                    packageSelect.innerHTML =
                        '<option value="">Select package</option>';

                    if (packages.length === 0) {
                        packageSelect.innerHTML =
                            '<option value="">No packages available</option>';
                        packageSelect.disabled = true;
                        return;
                    }

                    packages.forEach((package) => {
                        const option = document.createElement("option");
                        option.value = package.id;
                        option.textContent = package.name;
                        packageSelect.appendChild(option);
                    });

                    packageSelect.disabled = false;
                })
                .catch((error) => {
                    console.error("Error fetching packages:", error);
                    packageSelect.innerHTML =
                        '<option value="">Error loading packages</option>';
                    packageSelect.disabled = true;
                });
        });
    });
    </script>
@endsection