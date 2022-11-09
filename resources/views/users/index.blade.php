<x-layout :title="$title">
    <x-top-bar :title="$title">
        @if (auth()->user()->role == 'admin')
            <a href="/users/register" class="btn-primary">Add User</a>
        @endif

    </x-top-bar>
    <table class="w-full mt-5 hidden md:block fadeInBottom table-fixed">
        <thead class="w-full">
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal w-full">
                <td class="text-right pl-8">ID</td>
                <td class="pl-2 w-4/12">Name</td>
                <td class="tabledata w/3/12">Username</td>
                <td class="tabledata w-3/12">Email</td>
                <td class="tabledata w-2/12">Role</td>
                <td class="tabledata w-2/12">
                    <div class="w-full flex justify-center">
                        Actions
                    </div>
                </td>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light w-full">
            @foreach ($users as $user)
                @if ($user['id'] == '1')
                    @continue
                @endif
                <tr class="hover:bg-gray-200 odd:bg-gray-100 even:bg-gray-300 w-full">
                    <td class="text-right">{{ $user->id }}</td>
                    <td class="pl-2">{{ $user->name }}</td>
                    <td class="user-td">{{ $user->username }}</td>
                    <td class="user-td">{{ $user->email }}</td>
                    <td class="user-td capitalize">{{ $user->role }} </td>
                    <td class="user-td">
                        <div class="flex gap-4 justify-center w-full">
                            <a href="users/{{ $user->id }}/edit"><i
                                    class="fa-solid fa-edit hover:text-amber-600 hover:font-bold smooth"></i></a>
                            <form method="POST" action="/users/{{ $user->id }}/delete">
                                @csrf
                                @method('DELETE')
                                <button id="delete"
                                    onclick="return confirm('Are you sure you want to delete this record?')"> <i
                                        class="fa-regular fa-trash smooth hover:text-rose-600"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex flex-col gap-4 my-4 md:hidden">
        @foreach ($users as $user)
            @if ($user['id'] == '1')
                @continue
            @endif
            <x-card class="justify-between">
                <div class="flex items-center gap-4">
                    <div class="px-6 py-4 text-3xl rounded-lg bg-gray-300 font-bold justify-center items-center flex">
                        {{ $user->id }} </div>
                    <div>
                        <p class="flex flex-col	">
                            <span class="text-3xl font-thin text-lime-600">{{ $user->name }}</span>
                            <span class="text-gray-500 font-thin text-sm">{{ $user->username }}</span>
                        </p>
                        <p class="text-xs"><i class="fa-light fa-envelope"></i> {{ $user->email }}</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a href="users/{{ $user->id }}/edit"><i
                            class="fa-solid fa-edit hover:text-amber-600 hover:font-bold"></i></a>
                    <form method="POST" action="/users/{{ $user->id }}">
                        @csrf
                        @method('DELETE')
                        <button href='/umgmt' id="delete"
                            onclick="return confirm('Are you sure you want to delete this record?')"> <i
                                class="fa-regular fa-trash smooth hover:text-rose-600"></i></button>
                    </form>
                </div>

            </x-card>
        @endforeach
    </div>
    <div class="mt-6 w-full fadeInBottom">
        {{ $users->links() }}
    </div>
</x-layout>
