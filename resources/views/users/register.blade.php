<x-layout>
    <div class="flex flex-col items-center w-full gap-4">
        <div>
            <p class="font-bold text-4xl">Reigster a User</p>
        </div>
        <form action="/users/store" method="post">
            @csrf
            <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" autofocus>
            @error('name')
                <p class="text-rose-400 text-sm">{{ $message }}</p>
            @enderror
            <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
            @error('username')
                <p class="text-rose-400 text-sm">{{ $message }}</p>
            @enderror
            <select name="role" id="role">
                <option value="" disabled selected hidden>Please select an option</option>
                @foreach ($roles as $role)
                    <option value="{{ $role['value'] }}">{{ $role['name'] }}</option>
                @endforeach
            </select>
            @error('role')
                <p class="text-rose-400 text-sm">{{ $message }}</p>
            @enderror
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <p class="text-rose-400 text-sm">{{ $message }}</p>
            @enderror
            <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
            @error('password')
                <p class="text-rose-400 text-sm">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn-primary mt-4">Create</button>
        </form>
    </div>
</x-layout>
