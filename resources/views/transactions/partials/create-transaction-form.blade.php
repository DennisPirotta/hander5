<form method="post" action="{{ route('transactions.store') }}" class="mt-6 space-y-6">
    @csrf
    <div>
        <x-input-label for="name" :value="__('Amount')" />
        <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full" required autofocus/>
        <x-input-error class="mt-2" :messages="$errors->get('amount')" />
    </div>

    <div>
        <x-input-label for="customer" :value="__('Customer')" />
        <select id="customer" name="customer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('customer')" />
    </div>

    <div>
        <x-input-label for="datetime" :value="__('Date and time')" />
        <div class="flex flex-row">
            <div class="relative basis-2/3">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                <input id="datepicker" name="date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
            </div>
            <div class="ml-2 basis-1/3">
                <input id="timepicker" type="time" name="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('datetime')" />
    </div>

    <ul class="grid gap-6 w-full md:grid-cols-2">
        <li>
            <input type="radio" id="payed" name="payed" value="1" class="hidden peer" required>
            <label for="payed" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">{{ __('Payed') }}</div>
                </div>
                {!! config('icons.cash') !!}
            </label>
        </li>
        <li>
            <input type="radio" id="not-payed" name="payed" value="0" class="hidden peer" checked>
            <label for="not-payed" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">{{ __('Not Payed') }}</div>
                </div>
                {!! config('icons.ban') !!}
            </label>
        </li>
    </ul>

    <x-primary-button>{{ __('Create') }}</x-primary-button>
</form>

<script>
    document.addEventListener('DOMContentLoaded',function(){
        const date = document.getElementById('datepicker')
        const time = document.getElementById('timepicker')
        date.value = moment().format('DD-MM-YYYY')
        time.value = moment().format('HH:mm')
        new Datepicker(date, {
            autohide: true,
            clearBtn: true,
            todayBtn: true,
            todayBtnMode: 1,
            format: 'dd-mm-yyyy'
        })
    })

</script>