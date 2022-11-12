@auth
<nav
    class="z-50 flex-shrink-0 hidden w-64 overflow-y-auto bg-gray-800 md:flex flex-col justify-between sticky top-0">
    <x-sidebar-items />
</nav>
<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<nav
    class="fixed inset-y-0 z-50 flex-shrink-0 w-64 overflow-y-auto bg-gray-800 md:hidden flex flex-col justify-between h-full"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <x-sidebar-items />
</nav>
@endauth