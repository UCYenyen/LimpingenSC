@extends('layout.app')
@section('title', 'Request')

@section('content')
<link rel="stylesheet" href="/css/request.css">
<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="card request-card w-100">
        <div class="card-body p-4 p-md-5">
            <h3 class="text-center fw-bold mb-4">Request</h3>
            <form method="" action="">
                <div class="mb-4">
                    <label class="form-label fw-semibold">Service Type</label>
                    <select id="serviceSelect" name="service_id" class="form-select input-underline text-description" aria-label="Service type">
                        <option value="">Select service</option>
                        @if(isset($allServices))
                            @foreach($allServices as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Package</label>
                    <select id="packageSelect" name="package_id" class="form-select input-underline text-description" aria-label="Package" disabled>
                        <option value="">Select package</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Request Details</label>
                    <textarea name="description" rows="6" class="form-control input-underline" placeholder="Describe your request..."></textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="request-btn w-100 py-2 text-white">Request Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <script>
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
    </script> --}}
@endsection