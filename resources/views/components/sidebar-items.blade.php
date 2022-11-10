<div class=" text-stone-400">
    <a href="/">
        <img src="{{ asset('img/logo.svg') }}" alt="Logo"
            class="bg-gray-100 p-4 rounded-b-xl drop-shadow-md shadow-gray-900">
    </a>

    {{-- Menu Item Arrays --}}
    @php
        $menuitem = [
            [
                'name' => 'Users',
                'path' => 'users',
                'icon_class' => 'fa-solid fa-users-gear',
            ],
            [
                'name' => 'Transactions',
                'path' => 'transactions',
                'icon_class' => 'fa-regular fa-cash-register',
            ],
        ];
        
    @endphp

    {{-- Top level Menu --}}
    <ul class="mt-6">
        @foreach ($menuitem as $item)
            <li class="relative px-6 py-3">
                @if (str_contains(url()->current(), $item['path']))
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-lime-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true">
                    </span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-stone-200 {{ Request::path() == $item['path'] ? 'text-stone-100' : '' }}"
                    href="/{{ $item['path'] }}">
                    <i class="{{ $item['icon_class'] }} w-5 h-5 text-center"></i>
                    <span class="ml-4">{{ $item['name'] }}</span>
                </a>
            </li>
        @endforeach


    </ul>
</div>
<div>
    <ul class="">
        <li class="relative px-6 py-3 hidden md:block">

            <button
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-stone-200"
                @click="openModal" id="lgbtn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="ml-4">Log Out</span>
            </button>
            <script>
                $('#lgbtn').click(function() {
                    $('#modal').removeClass('hidden');
                    $('#modalbg').removeClass('hidden');
                    $('#modalbg').addClass('flex');
                });
            </script>
        </li>
    </ul>
</div>
