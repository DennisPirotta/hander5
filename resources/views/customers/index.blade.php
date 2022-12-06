<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full max-w-md p-4 bg-white border rounded-lg shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    @unless($customers->count() < 1)
                    <x-search-input :target="'customer-list'" :placeholder="__('Search Customers')"/>
                    <div class="flow-root">
                        <ul role="list" id="customer-list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($customers as $customer)
                                <li class="py-3 sm:py-4">
                                    <x-customer-card :customer="$customer" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                        <p class="dark:text-gray-300 text-gray-800">{{ __('No customers were found') }}</p>
                    @endunless
                </div>
            </div>
        </div>
    </div>
    <x-speed-dial>
        <x-speed-dial-option :route="route('customers.create')" :icon="config('icons.normal.add-circle')" :tooltip="__('New')"/>
    </x-speed-dial>
</x-app-layout>