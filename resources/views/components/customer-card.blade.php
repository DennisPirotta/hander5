<a class="flex items-center space-x-4">
    <div class="flex-shrink-0">
        <div class="inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
            <span class="font-medium text-gray-600 dark:text-gray-300">{{ $customer->name[0] }}</span>
        </div>
    </div>
    <div class="flex-1 min-w-0">
        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
            {{ $customer->name }}
            <small>
                <button onclick="window.location.href = '{{ route('customers.edit',$customer) }}'" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    {{ __('Edit') }}
                    <svg aria-hidden="true" class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </small>
        </p>
        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
            {{ $customer->exchanges()->get('debits')['count'] == 1 ? $customer->exchanges()->get('debits')['count'].' '.__('Transaction not payed') : $customer->exchanges()->get('debits')['count'].' '.__('Transactions not payed') }}
        </p>
    </div>
    <div class="text-xs">
        <div class="flex items-center justify-end text-right font-semibold text-green-500">
            {{ $customer->exchanges()->get('payed')['total'] }}
            {!! config('icons.small.euro') !!}
        </div>
        <div class="flex items-center justify-end font-semibold text-red-500">
            {{ $customer->exchanges()->get('debits')['total'] }}
            {!! config('icons.small.euro') !!}
        </div>
    </div>
</a>