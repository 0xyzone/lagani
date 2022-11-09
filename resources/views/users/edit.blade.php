<x-layout :title="$title">
    <div class="flex flex-col items-center w-full gap-4">
        <div class="fadeInTop">
            <p class="font-bold text-4xl">Reigster a User</p>
        </div>
        <form action="/users/{{$user->id}}/update" method="post" class="forms fadeInBottom">
            @csrf
            @method('PUT')
            <input type="text" name="name" id="name" placeholder="Name" value="{{ $user->name }}">
            @error('name')
                <p class="text-rose-400 text-sm">{{ $message }}</p>
            @enderror
            <input type="text" name="username" id="username" placeholder="Username" value="{{ $user->username }}">
            @error('username')
                <p class="text-rose-400 text-sm">{{ $message }}</p>
            @enderror
            <select name="role" id="role">
                <option value="" disabled selected hidden>Please select an option</option>
                @foreach ($roles as $role)
                    <option value="{{ $role['value'] }}"
                        @if ($user->role == $role['value']) selected
                    @else @endif>
                        {{ $role['name'] }}</option>
                @endforeach
            </select>
            @error('role')
                <p class="text-rose-400 text-sm">{{ $message }}</p>
            @enderror
            <input type="email" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
            @error('email')
                <p class="text-rose-400 text-sm">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn-primary mt-4">Update</button>
        </form>
    </div>
</x-layout>
