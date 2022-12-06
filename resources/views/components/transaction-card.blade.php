<a href="{{ route('transactions.edit',$transaction) }}" class="flex items-center space-x-4">
    <div class="flex-1 min-w-0">
        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
            {{ $transaction->customer->name }}
        </p>
        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
            {{ \Carbon\Carbon::parse($transaction->datetime)->translatedFormat('D j M H:s') }}
        </p>
    </div>
    <div class="{{ $transaction->payed ? 'text-green-600' : 'text-gray-500'}} inline-flex items-center text-base font-semibold">
        + {{ $transaction->amount }}
        {!! config('icons.normal.euro') !!}
    </div>
    <div>
        {!! config('icons.normal.chevron-right') !!}
    </div>
</a>