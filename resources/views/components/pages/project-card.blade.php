<div class="flex bg-white flex-col items-center gap-4 w-full p-4 rounded-lg shadow-lg">
    <div class="w-full aspect-[4/3] overflow-hidden rounded-lg"> <!-- Added container with fixed aspect ratio -->
        {{-- <img src="{{ $src }}" draggable="false" class="w-full h-full object-cover"
        alt="project image"
        > --}}
        <x-cloudinary::image public-id="{{$image_public_id}}" draggable="false" lass="w-full h-full object-cover object-center" alt="{{$alt}}"/>
    </div>
    <div class="flex flex-col gap-4 justify-center items-center w-full">
        <h2 class="text-4xl text-center font-bold text-black">{{ $name }}</h2>
        {{-- <p class="fs-5 fw-normal text-justify text-black">
            {{$slot}}
        </p> --}}
        <a href="/projects/{{ $id }}" class=" w-fit px-4 py-2 text-white bg-interactible-primary-active border border-interactible-primary-active hover:bg-zinc-50 hover:text-interactible-primary-active rounded-lg transition-all duration-200">
            View Details
        </a>
    </div>
</div>
