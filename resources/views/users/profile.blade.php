<x-layout :title='$title'>
    <x-card class="mb-4 fadeInTop relative">
        <img src="{{ asset('img/everest.png')}}" alt="everest img" class="object-cover absolute right-0 h-full w-full lg:w-6/12 top-0 opacity-20 bg-gradient-to-r from-transparent">
        <div class="rounded-full w-32 h-32 bg-white border-4 border-lime-600 flex justify-center items-center z-10">
            <i class="fa-duotone fa-user fa-2xl lagani-theme"></i>
        </div>
        <div class="z-20">
            <h1 class="text-4xl font-bold text-lime-600 leading-6">{{ $user->name }} <br> <span
                    class="text-xl text-gray-400 font-normal capitalize">{{ $user->role }}</span></h1>
            <div class="flex flex-col text-lg mt-2">
                <p><i class="fa-duotone fa-user-shield lagani-theme w-6 text-center"></i> {{ $user->username }}</p>
                <p><i class="fa-duotone fa-at lagani-theme w-6 text-center"></i> {{ $user->email }}</p>
            </div>
        </div>
    </x-card>
    @include('_partials.stats')
</x-layout>
