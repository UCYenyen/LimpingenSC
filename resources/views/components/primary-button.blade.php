<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full justify-center inline-flex items-center px-4 py-2 bg-interactible-primary-active border border-white rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:text-interactible-primary-active hover:bg-interactible-primary hover:border-interactible-primary-active transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
