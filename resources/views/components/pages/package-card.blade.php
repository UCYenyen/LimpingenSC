<a href="/request" class="relative flex p-6 justify-between flex-col items-center sm:items-start gap-4 bg-white shadow-lg rounded-lg transition-all w-full h-full min-h-[350px] overflow-hidden group cursor-pointer">
    <div class="absolute inset-0 bg-blue-600 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out"></div>
    
    <div class="relative z-10 flex flex-col gap-4 flex-grow group-hover:text-white transition-colors duration-300">
        <h3 class="font-bold text-2xl">{{ $name }}</h3>
        <h4 class="font-bold text-3xl text-blue-600 group-hover:text-white transition-colors duration-300">{{ $price }}</h4>
        <p class="font-normal text-base text-center sm:text-left">{{$slot}}</p>
    </div>
    
    <p class="relative z-10 font-bold text-sm text-blue-600 group-hover:text-white transition-colors duration-300 mt-auto">Request Now</p>
</a>