
<div class="py-4 text-stone-400">
    <a class="ml-6 text-2xl font-bold text-stone-200" href="/">
        Admin Portal
    </a>

    {{-- Menu Item Arrays --}}
    @php
        $menuitem = [
            [
                'name' => 'Transaction',
                'path' => 'transaction',
                'icon_class' => 'fa-regular fa-cash-register',
            ],
        ];
        
    @endphp

    {{-- Top level Menu --}}
    <ul class="mt-6">
        @foreach ($menuitem as $item)
            <li class="relative px-6 py-3">
                <span
                    class="absolute inset-y-0 left-0 w-1 bg-lime-600 rounded-tr-lg rounded-br-lg {{ Request::path() == $item['path'] ? '' : 'hidden' }}"
                    aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-stone-200 {{ Request::path() == $item['path'] ? 'text-stone-100' : '' }}"
                    href="/{{ $item['path'] }}">
                    <i class="{{ $item['icon_class'] }} w-5 h-5 text-center"></i>
                    <span class="ml-4">{{ $item['name'] }}</span>
                </a>
            </li>
        @endforeach


    </ul>
    @if (auth()->user()->role == 'admin')
        <div class="px-6 my-6">
            <button
                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-lime-600 border border-transparent rounded-lg active:bg-lime-600 hover:bg-lime-700 focus:outline-none focus:shadow-outline-lime"
                onclick="window.location.replace('/users/register')">
                Create account
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div>
    @endif
</div>
<div>
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            
                <button
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-stone-200" @click="openModal"
                    id="lgbtn">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="ml-4">Log Out</span>
                </button>
                <script>
                    $('#lgbtn').click( function() {
                        $('#modal').removeClass('hidden');
                        $('#modalbg').removeClass('hidden');
                        $('#modalbg').addClass('flex');
                    });
                </script>
        </li>
    </ul>
</div>