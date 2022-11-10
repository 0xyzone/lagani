<x-layout :title='$title'>
    <div class="flex flex-col flex-1 w-full items-center">
        <form action="/transactions/withdrawl/{{$withdrawl->id}}/update" method="post" class="w-full lg:w-4/12 forms !gap-4">
            <div class="text-2xl font-bold text-center mb-4">Update Withdrawl #{{$withdrawl->id}}</div>
            @csrf
            @method('PUT')
            <select name="user_id" id="user_id" class="text-gray-200">
                <option value="" disabled
                    @if ($withdrawl->user_id) @else
                    selected @endif hidden>Please select a
                    user</option>
                @foreach ($users as $user)
                    @if ($user->id == 1)
                        @continue
                    @endif
                    <option value="{{ $user->id }}"
                        @if ($withdrawl->user_id == $user->id) selected
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
                    value="{{ $withdrawl->transaction_date }}">
            </div>
            @error('transaction_date')
                <p class="text-red-300 text-sm font-thin">{{ $message }}</p>
            @enderror

            <div class="flex items-center gap-2">
                <label for="cheque_no" class="text-right">Cheque Number</label>
                <input type="number" name="cheque_no" id="cheque_no" placeholder="Cheque No." value="{{ $withdrawl->cheque_no }}">
            </div>
            @error('cheque_no')
                <p class="text-red-300 text-sm font-thin">{{ $message }}</p>
            @enderror

            <div class="relative flex">
                <p class="absolute bottom-1.5 font-extrabold">रू</p>
                <input type="number" name="amount" id="amount" placeholder="Amount" autocomplete="off"
                    class="appearance-none ml-5" value="{{ $withdrawl->amount }}">
            </div>
            @error('amount')
                <p class="text-red-300 text-sm font-thin">{{ $message }}</p>
            @enderror

            <textarea name="comments" id="comments" rows="2" placeholder="Some comments here..."
                class="rounded-lg bg-gray-300/50 placeholder:text-gray-300 text-white">{{$withdrawl->comments}}</textarea>
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
