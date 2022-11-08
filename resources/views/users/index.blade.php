<x-layout :title="$title">
    <x-top-bar :title="$title">
        @if (auth()->user()->role == 'Admin')
            <a href="/users/register" class="btn-primary">Add User</a>
        @endif
        
    </x-top-bar>
    <table class="w-full mt-5 hidden md:inline-block fadeInBottom">
        <thead class="w-full">
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal w-full">
                <td class="tabledata">ID</td>
                <td class="tabledata">Name</td>
                <td class="tabledata">Username</td>
                <td class="tabledata">Email</td>
                <td class="tabledata">Role</td>
                <td class="tabledata"><div class="w-full flex justify-center">Actions</div></td>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($users as $user)
                @if ($user['id'] == '1')
                    @continue
                @endif
                <tr class="hover:bg-gray-200 odd:bg-gray-100 even:bg-gray-300">
                    <td class="user-td">{{ $user->id }}</td>
                    <td class="user-td">{{ $user->name }}</td>
                    <td class="user-td">{{ $user->username }}</td>
                    <td class="user-td">{{ $user->email }}</td>
                    <td class="user-td">{{ $user->role }} </td>
                    <td class="user-td">
                        <div class="flex gap-4 justify-center w-full">
                            <a href="users/{{ $user->id }}/edit"><i
                                    class="fa-solid fa-edit hover:text-amber-600 hover:font-bold smooth"></i></a>
                            <form method="POST" action="/users/{{ $user->id }}">
                                @csrf
                                @method('DELETE')
                                <button href='/umgmt' id="delete"
                                    onclick="return confirm('Are you sure you want to delete this record?')"> <i
                                        class="fa-regular fa-trash smooth hover:text-rose-600"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>