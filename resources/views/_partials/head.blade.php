<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <script src="{{ asset('js/focus-trap.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title id="title">
        @hasSection('title')
            @yield('title') | Finance Portal
        @else
            Finance Portal
        @endif
    </title>

    <script type="text/javascript">
        function display_ct7() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
            hours = x.getHours() % 12;
            hours = hours ? hours : 12;
            hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

            var minutes = x.getMinutes().toString()
            minutes = minutes.length == 1 ? 0 + minutes : minutes;

            var seconds = x.getSeconds().toString()
            seconds = seconds.length == 1 ? 0 + seconds : seconds;

            var dt = x.getDate().toString();
            dt = dt.length == 1 ? 0 + dt : dt;

            var x1 = x.toLocaleString('default', {
                month: 'short'
            }) + " " + dt + ", " + x.getFullYear();
            x1 = x1 + " | " + hours + ":" + minutes + ":" + seconds + " " + ampm;
            $('#ct7').html(x1);
            display_c7();
        }

        function display_c7() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct7()', refresh)
        }
        display_c7()
    </script>
</head>
