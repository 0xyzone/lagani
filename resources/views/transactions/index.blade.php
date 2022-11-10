<x-layout :title='$title'>
    <x-top-bar :title='$title'>
        <a href="/transactions/deposit" class="btn-primary">Add Deposit</a>
        <a href="/transactions/withdrawl" class="btn-primary">Add Withdrawl</a>
    </x-top-bar>
    @include('_partials.depositsTable')
    @include('_partials.withdrawlsTable')
</x-layout>
