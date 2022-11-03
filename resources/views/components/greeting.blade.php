<h1 {{$attributes->merge(['class' => 'text-white text-4xl flex gap-2 flex-wrap items-end'])}}>
    @php
    date_default_timezone_set('Asia/Kathmandu');
    @endphp

    @if (date("H") < 5)
        <p>Hey! Night Owl!</p> <span class="font-bold text-lime-600"> {{auth()->user()->name}} </span> 
    @elseif ((date("H") >= 5) && (date("H") < 12))
        <p>Good Morning!</p> <span class="font-bold text-lime-600"> {{auth()->user()->name}} </span>
    @elseif ((date("H") >= 12) && (date("H") < 17))
        <p>Good Afternoon!</p> <span class="font-bold text-lime-600"> {{auth()->user()->name}} </span>
    @elseif (date("H") >= 17)
        <p>Good Evening!</p> <span class="font-bold text-lime-600"> {{auth()->user()->name}} </span>
    @endif
</h1>