<div class="d-flex p-4 justify-content-between flex-column align-items-center align-items-sm-start gap-4 bg-white shadow-lg rounded-lg services-card transition-all" style="max-width: 400px; transition: all 0.3s ease;">
    <div class="d-flex flex-column gap-4">
        <h3 class="fw-bold fs-4">{{ $name }}</h3>
        <h4 class="fw-bold fs-3 text-button-blue">{{ $price }}</h4>
        <p class="fw-normal fs-6 text-center text-sm-start">{{$slot}}
        </p>
    </div>
    <a href="/request" class="fw-bold fs-8 text-button-blue">Request Now</a>
</div>