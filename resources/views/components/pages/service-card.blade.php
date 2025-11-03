<div class="flex h-full p-4 flex-col items-center sm:items-start gap-4 bg-interactible-primary shadow-[0_1px_10px_rgba(0,0,0,0.2)] border-b-2 border-blue-500 hover:bg-interactible-primary-active rounded-lg services-card">
    <div class="rounded-full bg-icon-primary p-2 w-fit">
        @if ($service_type == "Websites")
            <img src="/images/home/crown.svg" draggable="false" width="50" height="50" alt="">
        @elseif ($service_type == "Mobile Apps")
            <img src="/images/home/phone.svg" draggable="false" width="50" height="50" alt="">
        @elseif ($service_type == "Digital Marketing")
            <img src="/images/home/building.svg" draggable="false" width="50" height="50" alt="">
        @elseif ($service_type == "E-Commerce")
            <img src="/images/home/cart.svg" draggable="false" width="50" height="50" alt="">
        @endif
    </div>
    <h3 class="font-bold fs-4">{{ $service_type }}</h3>
    <p class="font-regular fs-6 text-center sm:text-start">{{$slot}}
    </p>
</div>