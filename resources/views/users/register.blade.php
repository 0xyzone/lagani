@if (auth()->user()->role != 'admin')
    <x-layout :title="$title">
        Not Permited
    </x-layout>
@else
    <x-layout :title="$title">
        <div class="flex flex-col items-center w-full gap-4">
            <div class="fadeInTop">
                <p class="font-bold text-4xl">Reigster a User</p>
            </div>
            <form action="/users/store" method="post" class="forms fadeInBottom">
                @csrf
                <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}"
                    autofocus>
                @error('name')
                    <p class="text-rose-400 text-sm">{{ $message }}</p>
                @enderror
                <input type="text" name="username" id="username" placeholder="Username"
                    value="{{ old('username') }}">
                @error('username')
                    <p class="text-rose-400 text-sm">{{ $message }}</p>
                @enderror
                <select name="role" id="role">
                    <option value="" disabled selected hidden>Please select an option</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role['value'] }}"
                            @if (old('role') == $role['value']) selected
                    @else @endif>
                            {{ $role['name'] }}</option>
                    @endforeach
                </select>
                @error('role')
                    <p class="text-rose-400 text-sm">{{ $message }}</p>
                @enderror
                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <p class="text-rose-400 text-sm">{{ $message }}</p>
                @enderror
                <input type="password" name="password" id="password" placeholder="Password"
                    value="{{ old('password') }}">
                @error('password')
                    <p class="text-rose-400 text-sm">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn-primary mt-4">Create</button>
            </form>
        </div>
        <div class="flex flex-col items-center w-full gap-4 mt-5">
            <div class="fadeInBottom">
                <p class="font-bold text-4xl">Recent Addition</p>
            </div>
            <table class="w-full mt-2 hidden md:block fadeInBottom table-fixed">
                <thead class="w-full">
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal w-full">
                        <td class="tabledata w-1/12">ID</td>
                        <td class="tabledata w-4/12">Name</td>
                        <td class="tabledata w/2/12">Username</td>
                        <td class="tabledata w-2/12">Email</td>
                        <td class="tabledata w-2/12">Role</td>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light w-full">
                    @foreach ($users as $user)
                        @if ($user['id'] == '1')
                            @continue
                        @endif
                        <tr class="hover:bg-gray-200 odd:bg-gray-100 even:bg-gray-300 w-full">
                            <td class="user-td">{{ $user->id }}</td>
                            <td class="user-td">{{ $user->name }}</td>
                            <td class="user-td">{{ $user->username }}</td>
                            <td class="user-td">{{ $user->email }}</td>
                            <td class="user-td capitalize">{{ $user->role }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-6 w-full fadeInBottom">
                {{ $users->links() }}
            </div>
        </div>
    </x-layout>
@endif
