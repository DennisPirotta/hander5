<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Customer') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once this customer is deleted, all of its resources and data will be permanently deleted. Before deleting this customer, please save any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-customer-deletion')"
    >{{ __('Delete Customer') }}</x-danger-button>

    <x-modal name="confirm-customer-deletion" focusable>
        <form method="post" action="{{ route('customers.destroy',$customer) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Are you sure your want to delete this customer?</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once this customer is deleted, all of its resources and data will be permanently deleted. Please enter the customer name to confirm you would like to permanently delete it.') }}
            </p>

            <p class="mt-3 text-xs text-gray-600 dark:text-gray-400">
                {{ __('The selected customer name is') }} [{{ $customer->name }}]
            </p>

            <div class="mt-4">
                <x-input-label for="delete-name" value="Name" class="sr-only" />

                <x-text-input
                        id="delete-name"
                        name="customer-name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Name"
                />

                <x-input-error :messages="$errors->get('customer-name')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Customer') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
