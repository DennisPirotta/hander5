<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>


    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <div class="w-full max-w-md p-4 bg-white border rounded-lg shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <x-transactions-list :transactions="$transactions" />
                </div>

            </div>
        </div>
    </div>

    <x-speed-dial>
        <x-speed-dial-option :tooltip="__('New')" :icon="config('icons.normal.add-circle')" :route="route('transactions.create')"/>
    </x-speed-dial>

</x-app-layout>