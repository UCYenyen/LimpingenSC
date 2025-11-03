<div class="flex bg-white flex-col items-center gap-4 w-full p-4 rounded-lg shadow-lg">
    <div class="w-full aspect-[4/3] overflow-hidden rounded-lg"> <!-- Added container with fixed aspect ratio -->
        <img src="/images/projects/{{ $src }}" draggable="false" class="w-full h-full object-cover" <!-- Changed
            to object-cover to maintain aspect ratio -->
        alt="project image"
        >
    </div>
    <div class="flex flex-col gap-4 justify-center items-center w-full">
        <h2 class="text-4xl text-center font-bold text-black">{{ $name }}</h2>
        {{-- <p class="fs-5 fw-normal text-justify text-black">
            {{$slot}}
        </p> --}}
        <a href="/projects/{{ $id }}" class="btn btn-blue w-fit px-4 py-2 text-white"
            style="background-color: #5D71D6;">
            View Details
        </a>
    </div>
</div>
