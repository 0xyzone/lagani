<div class=" text-gray-300">
    <a href="/">
        <img src="{{ asset('img/logo.svg') }}" alt="Logo"
            class="bg-gray-100 p-4 rounded-b-xl drop-shadow-md shadow-gray-900">
    </a>

    {{-- Menu Item Arrays --}}
    @php
        $menuitem = [
            [
                'name' => 'Dashboard',
                'path' => 'dashboard',
                'icon_class' => 'fa-solid fa-dashboard',
            ],
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
        @php
            $role = auth()->user()->role;
        @endphp
        @foreach ($menuitem as $item)
            @php
                $name = $item['name'];
            @endphp
            @if ($role == 'investor')
                @if (in_array($name, ['Users', 'Transactions']))
                    @continue
                @endif
                @include('_partials.menuButtons')
            @endif
            @if ($role == 'admin')
                @if ($name == 'Dashboard')
                    @continue
                @endif
                @include('_partials.menuButtons')
            @endif
        @endforeach


    </ul>
</div>
