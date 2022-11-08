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
            <div class="relative flex flex-col justify-center items-end">
                <input type="password" name="password" id="password" placeholder="Password"
                    value="{{ old('password') }}" class="mt-2">
                @error('password')
                    <p class="text-rose-400 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn-primary mt-4">Login</button>
        </form>
    </div>
</x-layout>
