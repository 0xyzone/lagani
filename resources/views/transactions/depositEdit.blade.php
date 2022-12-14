@if (auth()->user()->role == 'admin')
    
<x-layout :title='$title'>
    <div class="flex flex-col flex-1 w-full items-center">
        <form action="/transactions/deposit/{{$deposit->id}}/update" method="post" class="w-full lg:w-4/12 forms !gap-4">
            <div class="text-2xl font-bold text-center mb-4">Update Deposit #{{$deposit->id}}</div>
            @csrf
            @method('PUT')
            <select name="user_id" id="user_id" class="text-gray-200">
                <option value="" disabled
                    @if ($deposit->user_id) @else
                    selected @endif hidden>Please select a
                    user</option>
                @foreach ($users as $user)
                    @if ($user->id == 1)
                        @continue
                    @endif
                    <option value="{{ $user->id }}"
                        @if ($deposit->user_id == $user->id) selected
                    @else @endif>{{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <p class="text-red-300 text-sm font-thin">{{ $message }}</p>
            @enderror

            <div class="flex items-center gap-2">
                <label for="transaction_date" class="text-right">Transaction Date: </label>
                <input type="date" name="transaction_date" id="transaction_date" class="text-lg"
                    value="{{ $deposit->transaction_date }}">
            </div>
            @error('transaction_date')
                <p class="text-red-300 text-sm font-thin">{{ $message }}</p>
            @enderror

            <input type="text" name="transaction_id" id="transaction_id" placeholder="Transaction id (Optional)"
                autocomplete="off" value="{{ $deposit->transaction_id }}">
            @error('transaction_id')
                <p class="text-red-300 text-sm font-thin">{{ $message }}</p>
            @enderror

            <div class="relative flex items-center">
                <p class="font-extrabold">??????</p>
                <input type="number" name="amount" id="amount" placeholder="Amount" autocomplete="off"
                    class="appearance-none ml-2" value="{{ $deposit->amount }}">
            </div>
            @error('amount')
                <p class="text-red-300 text-sm font-thin">{{ $message }}</p>
            @enderror

            <textarea name="comments" id="comments" rows="2" placeholder="Some comments here..."
                class="rounded-lg bg-gray-300/50 placeholder:text-gray-300 text-white">{{$deposit->comments}}</textarea>
            @error('comments')
                <p class="text-red-300 text-sm font-thin">{{ $message }}</p>
            @enderror

            <div class="flex items-center gap-4">
                <input class="w-4 ring-0 border-none outline-none focus:ring-0 focus:border-0 focus:outline-none smooth"
                    type="checkbox" name="verified" id="verified" value="VERIFIED" checked>
                <label for="verified">I hereby declair that all the information above is correct and I declair it to be
                    verified.</label>
            </div>
            @error('verified')
                <p class="text-red-300 text-sm font-thin">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn-primary w-max mx-auto">Update</button>
        </form>
    </div>
</x-layout>
@else
<x-layout>
    Not Permited
</x-layout>
@endif
