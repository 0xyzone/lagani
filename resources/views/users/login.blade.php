<x-layout>
    <div class="flex flex-col items-center justify-center h-full w-full gap-4">
        <form action="/users/authenticate" method="post" class="forms">
            <div>
                <p class="font-bold text-4xl text-center mb-4">Login</p>
            </div>
            @csrf
            <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
            @error('username')
                <p class="text-rose-400 text-sm">{{ $message }}</p>
            @enderror
            <div class="flex flex-col justify-center items-end mt-2">
                <div class="relative w-full items-center flex">
                    <input type="password" name="password" id="password" placeholder="Password"
                        value="{{ old('password') }}" class="">
                    <a href="javascript:void(0)" class="absolute right-2 top-1/4" id="showhide" tabindex="-1"><i
                            class="fa-solid absolute right-1 fa-eye" id="eye"></i></a>
                </div>

                @error('password')
                    <p class="text-rose-400 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn-primary mt-4">Login</button>
        </form>
        <script>
            $('#showhide').click(function() {
                // alert("Handler for .click() called.");
                if ($('#password').attr('type') == "password") {
                    $('#password').attr('type', 'text');
                    $('#eye').removeClass('fa-eye');
                    $('#eye').addClass('fa-eye-slash');
                } else {
                    $('#password').attr('type', 'password');
                    $('#eye').removeClass('fa-eye-slash');
                    $('#eye').addClass('fa-eye');
                }
            });
        </script>
    </div>
</x-layout>
