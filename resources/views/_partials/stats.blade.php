<div class="grid grid-cols-1 md:grid-cols-4 gap-4 fadeInTop">
    <x-card>
        <div class="w-16 h-16 flex justify-center items-center">
            <i class="fa-duotone fa-circle-dollar-to-slot fa-2xl lagani-theme"></i>
        </div>
        <p>Total investment <br><span class="dashboard_stats">{{$total_deposit}}</span></p>
    </x-card>
    <x-card>
        <div class="w-16 h-16 flex justify-center items-center">
            <i class="fa-duotone fa-hand-holding-dollar fa-2xl lagani-theme"></i>
        </div>
        <p>Towards Vidanta <br><span class="dashboard_stats">{{$total_deposit * 0.6}}</span></p>
    </x-card>
    <x-card>
        <div class="w-16 h-16 flex justify-center items-center">
            <i class="fa-duotone fa-wallet fa-2xl lagani-theme"></i>
        </div>
        <p>Total Savings <br><span class="dashboard_stats">{{($total_deposit * 0.4) - $total_withdrawl}}</span></p>
    </x-card>
    <x-card>
        <div class="w-16 h-16 flex justify-center items-center">
            <i class="fa-duotone fa-money-from-bracket fa-2xl lagani-theme"></i>
        </div>
        <p>Total Withdrawl <br><span class="dashboard_stats">{{$total_withdrawl}}</span></p>
    </x-card>
</div>