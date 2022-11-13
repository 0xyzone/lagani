<h1 class="mt-6 text-2xl md:font-bold fadeInBottom">Deposits</h1>
<table class="w-full mt-5 fadeInBottom table-fixed hidden md:block">
    <thead class="w-full">
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal w-full">
            <td class="text-right w-1/12 pr-2">ID</td>
            <td class="tabledata w-2/12 text-center">Date</td>
            @if (str_contains(url()->current(), 'dashboard'))
            @else
                <td class="pl-2 w-3/12">Depositor's Name</td>
            @endif
            <td class="tabledata w-2/12">Transaction ID</td>
            <td class="tabledata w-2/12">Ammount</td>
            <td class="tabledata w-3/12">Comments</td>
            @if (str_contains(url()->current(), 'dashboard'))
            @else
            <td class="tabledata w-2/12">
                <div class="w-full flex justify-center">
                    Actions
                </div>
            </td>
            @endif
        </tr>
    </thead>
    <tbody class="text-gray-600 text-sm font-light w-full">
        @foreach ($deposits as $deposit)
            <tr class="hover:bg-gray-200 odd:bg-gray-100 even:bg-gray-300 w-full">
                <td class="text-right pr-2">{{ $deposit->id }}</td>
                <td class="user-td text-center">{{ date('jS M, Y', strtotime($deposit->transaction_date)) }}</td>
                @if (str_contains(url()->current(), 'dashboard'))
                @else
                <td class="pl-2">
                    @foreach ($users as $user)
                        @if ($user->id == $deposit->user_id)
                            {{ $user->name }}
                        @endif
                    @endforeach
                </td>
                @endif
                <td class="user-td">{{ $deposit->transaction_id }}</td>
                <td class="user-td">रु. {{ IND_money_format($deposit->amount) }}</td>
                <td class="user-td">
                    @if ($deposit->comments == '')
                        No comments
                    @else
                        {{ $deposit->comments }}
                    @endif
                </td>
                @if (str_contains(url()->current(), 'dashboard'))
                @else
                <td class="user-td">
                    <div class="flex gap-4 justify-center w-full">
                        <a href="transactions/deposit/{{ $deposit->id }}/edit"><i
                                class="fa-solid fa-edit hover:text-amber-600 hover:font-bold smooth"></i></a>
                        <form method="POST" action="transactions/deposit/{{ $deposit->id }}/delete">
                            @csrf
                            @method('DELETE')
                            <button id="delete"
                                onclick="return confirm('Are you sure you want to delete this record?')"> <i
                                    class="fa-regular fa-trash smooth hover:text-rose-600"></i></button>
                        </form>
                    </div>
                </td>
                @endif
            </tr>
        @endforeach
        @if ($deposits->count() == 0)
            <tr class="hover:bg-gray-200 odd:bg-gray-100 even:bg-gray-300 w-full">
            @if (str_contains(url()->current(), 'dashboard'))
            <td class="user-td text-center" colspan="5">No records found!</td>
            @else
            <td class="user-td text-center" colspan="7">No records found!</td>
            @endif
            </tr>
        @endif
    </tbody>
</table>
<div class="flex flex-col w-full gap-4 fadeInBottom mt-6">
    @foreach ($deposits as $deposit)
    <x-card>
        
    </x-card>
    @endforeach
</div>
<div class="mt-6 w-full fadeInBottom">
    {{ $deposits->links() }}
</div>
