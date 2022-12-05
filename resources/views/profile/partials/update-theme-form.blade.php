<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Theme Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update theme information") }}
        </p>
    </header>

    <ul class="grid gap-6 w-full md:grid-cols-2 mt-6" id="theme-selector"
        x-data="{
                    setLight: () => {
                        localStorage.theme = 'light'
                        document.documentElement.classList.remove('dark')
                    },
                    setDark: () => {
                        localStorage.theme = 'dark'
                        document.documentElement.classList.add('dark')
                    },
                }">
        <li>
            <input type="radio" id="light" name="theme" value="light" class="hidden peer" required @click="setLight" :checked="localStorage.theme === 'light'">
            <label for="light" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">{{ __('Light') }}</div>
                </div>
                {!! config('icons.light-bulb') !!}
            </label>
        </li>
        <li>
            <input type="radio" id="dark" name="theme" value="dark" class="hidden peer" @click="setDark" :checked="localStorage.theme === 'dark'">
            <label for="dark" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">{{ __('Dark') }}</div>
                </div>
                {!! config('icons.sun') !!}
            </label>
        </li>
    </ul>

{{--    <script>--}}
{{--        $(()=>{--}}
{{--            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {--}}
{{--                document.documentElement.classList.add('dark')--}}
{{--            } else {--}}
{{--                document.documentElement.classList.remove('dark')--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}

</section>
