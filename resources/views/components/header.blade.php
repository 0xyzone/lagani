@auth
<header class="z-20 py-4 shadow-md bg-stone-800 sticky top-0">
    <div class="container flex items-center justify-between h-full px-6 mx-auto text-lime-300">
        <!-- Mobile hamburger -->
        <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-lime"
            @click="toggleSideMenu" aria-label="Menu">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <!-- Search input -->

        <div class="flex justify-center flex-1 lg:mr-32">
            <div class="relative w-full max-w-xl mr-6 focus-within:text-lime-500">
                @if (Request::path() === 'transaction')
                    <div class="absolute inset-y-0 flex items-center pl-2">
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <form action="" method="get" class="w-full">
                        <input
                            class="w-full !pl-8 pr-2 text-sm border-0 rounded-md placeholder-stone-500 focus:placeholder-stone-600 text-stone-200 form-input"
                            type="number" name="search" placeholder="Search for trannsactions" aria-label="Search" />
                    </form>
                @endif
            </div>
        </div>
        <span id='ct7' class="mr-2"></span>
        <ul class="flex items-center flex-shrink-0 space-x-6">
            <!-- Notifications menu -->
            <li class="relative">
                <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-lime"
                    @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications"
                    aria-haspopup="true">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                        </path>
                    </svg>
                    <!-- Notification badge -->
                    <span aria-hidden="true"
                        class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 rounded-full border-stone-800"></span>
                </button>
                <template x-if="isNotificationsMenuOpen">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @click.away="closeNotificationsMenu"
                        @keydown.escape="closeNotificationsMenu"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 border rounded-md shadow-md text-stone-300 border-stone-700 bg-stone-700">
                        <li class="flex">
                            <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-stone-800 hover:text-stone-200"
                                href="#">
                                <span>Messages</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none rounded-full text-red-100 bg-red-600">
                                    13
                                </span>
                            </a>
                        </li>
                </template>
            </li>
            <!-- Profile menu -->
            <li class="relative">
                <button class="align-middle rounded-full focus:shadow-outline-lime focus:outline-none"
                    @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                    aria-haspopup="true">
                    <img class="object-cover w-8 h-8 rounded-full"
                        src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                        alt="" aria-hidden="true" />
                </button>
                <template x-if="isProfileMenuOpen">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @click.away="closeProfileMenu"
                        @keydown.escape="closeProfileMenu"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 border rounded-md shadow-md border-stone-700 text-stone-300 bg-stone-700"
                        aria-label="submenu">
                        <li class="flex">
                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-stone-800 hover:text-stone-200"
                                href="/profile">
                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                    </path>
                                </svg>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li class="flex">

                            <button type="submit" for="loggingout" @click="openModal" id="lgbtn2"
                                class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-stone-800 hover:text-stone-200">
                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span>Log out</span>
                                <script>
                                    $('#lgbtn2').click(function() {
                                        console.log('clicked');
                                        $('#modal').removeClass('hidden');
                                        $('#modalbg').removeClass('hidden');
                                        $('#modalbg').addClass('flex');
                                    });
                                </script>
                            </button>

                        </li>
                    </ul>
                </template>
            </li>
        </ul>
    </div>
</header>
@endauth