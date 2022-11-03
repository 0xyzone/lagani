<x-layout>
    <div class="flex flex-col items-center w-full gap-4">
        <div>
            <p class="font-bold text-4xl">Login</p>
        </div>
        <form action="/users/authenticate" method="post">
            @csrf
            <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
            @error('username')
                <p class="text-rose-400 text-sm">{{$message}}</p>
            @enderror
            <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
            @error('password')
                <p class="text-rose-400 text-sm">{{$message}}</p>
            @enderror
            <button type="submit" class="btn-primary mt-4">Login</button>
        </form>
    </div>
</x-layout>
