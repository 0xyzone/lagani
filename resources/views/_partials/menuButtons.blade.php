<li class="relative px-6 py-3">
    @if (str_contains(url()->current(), $item['path']))
        <span class="absolute inset-y-0 left-0 w-1 bg-lime-600 rounded-tr-lg rounded-br-lg" aria-hidden="true">
        </span>
    @endif
    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-stone-200 {{ Request::path() == $item['path'] ? 'text-stone-100' : '' }}"
        href="/{{ $item['path'] }}">
        <i class="{{ $item['icon_class'] }} w-5 h-5 text-center"></i>
        <span class="ml-4">{{ $item['name'] }}</span>
    </a>
</li>
