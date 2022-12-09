<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Transaction') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your transaction is deleted, all of its resources and data will be permanently deleted. Before deleting your transactions, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-transaction-deletion')"
    >{{ __('Delete Transaction') }}</x-danger-button>

    <x-modal name="confirm-transaction-deletion" :show="$errors->isNotEmpty()" focusable>
        <form method="post" action="{{ route('transactions.destroy',$transaction) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Are you sure your want to delete this transaction?</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your transaction is deleted, all of its resources and data will be permanently deleted.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Transaction') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
