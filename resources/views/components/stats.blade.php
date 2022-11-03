@php
$card = [
    [
        'title' => 'Total Investment',
        'icon' => 'fa-solid fa-hand-holding-dollar',
        'amt' => '1000',
    ],
    [
        'title' => 'Total Savings',
        'icon' => 'fa-solid fa-piggy-bank',
        'amt' => '1000',
    ],
    [
        'title' => 'Towards Vidanta',
        'icon' => 'fa-brands fa-viacoin',
        'amt' => '1000',
    ],
];
@endphp

<div class="grid xl:grid-cols-3 grid-cols-1 w-full gap-4 fadeInTop">
    @foreach ($card as $item)
        <x-card>
            <i class="{{$item['icon']}} fa-2x w-16 text-center"></i>
            <p class="flex-wrap text-4xl">{{$item['title']}}<br>
                <span class="font-bold text-lime-500">{{$item['amt']}}</span>
            </p>
        </x-card>
    @endforeach
</div>
