@unless($transactions->count() < 1)
    <x-search-input :target="'transactions-list'" :placeholder="__('Search Transactions')"/>
    <div class="flow-root">
    <ul role="list" id="transactions-list" class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach($transactions as $transaction)
            <li class="py-3 sm:py-4">
                <x-transaction-card :transaction="$transaction" />
            </li>
        @endforeach
    </ul>
</div>
@else
    <p class="dark:text-gray-300 text-gray-800">{{ __('No transactions were found') }}</p>
@endunless