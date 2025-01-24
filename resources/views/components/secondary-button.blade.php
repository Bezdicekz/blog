<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-BarvaTlacitka2 border border-BarvaTlacitka1 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-BarvaTlacitka3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
