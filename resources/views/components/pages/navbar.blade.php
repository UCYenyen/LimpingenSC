<header
    class="relatvie z-[100] fixed w-screen overflow-x-hidden bg-white h-[7vh] px-[5%] flex justify-between items-center text-sm not-has-[nav]:hidden shadow-md">
    @if (Route::has('login'))
        <nav class="flex items-center text-black w-full justify-between gap-4">
            <a href="/" class="flex gap-1 items-center justify-center">
                <img src="/limpingen-logo.svg" class="w-14 h-auto" alt="limpingen logo">
                <h1 class="hidden md:inline-block font-semibold text-lg text-primary">Limpingen Soft Comp</h1>
            </a>
            <div class="hidden gap-4 md:flex items-center justify-center">
                <x-pages.navigation-link link="/projects" className="">Projects</x-pages.navigation-link>
                <x-pages.navigation-link link="/pricing" className="">Pricing</x-pages.navigation-link>
                @auth
                    @if (auth()->user()->role == 'admin')
                        <x-pages.navigation-link link="/admin" className="">Admin</x-pages.navigation-link>
                    @endif
                    <x-pages.logout-btn />
                @else
                    <a href="{{ route('login') }}""
                        class="bg-interactible-primary-active text-white px-4 py-2 rounded-lg hover:bg-icon-primary border border-interactible-primary-active hover:text-interactible-primary-active transition-all duration-100">Login</a>
                @endauth
            </div>
            <button id="hamburgerButton" class="hamburger-menu flex md:hidden flex-col gap-1" type="button">
                <div class="w-6 h-1 bg-primary"></div>
                <div class="w-6 h-1 bg-primary"></div>
                <div class="w-6 h-1 bg-primary"></div>
            </button>
        </nav>
    @endif
    <div class="mobile-panel md:hidden" id="panelMenuMobile">
        <div class="flex flex-col text-black font-semibold items-center gap-3 mt-4 mb-3">
            <x-pages.navigation-link link="/projects" className="">Projects</x-pages.navigation-link>
            <x-pages.navigation-link link="/pricing" className="">Pricing</x-pages.navigation-link>
            @auth
                @if (auth()->user()->role == 'admin')
                    <x-pages.navigation-link link="/admin" className="">Admin</x-pages.navigation-link>
                @endif
                <x-pages.logout-btn />
            @else
                <a class="py-2 px-4 rounded-2 text-white" style="background-color: #5D71D6" href="/login">Login</a>
            @endauth
        </div>
    </div>
</header>
