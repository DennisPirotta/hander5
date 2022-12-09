<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Common Transactions') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Summary of the most frequent common transactions") }}
        </p>
    </header>

    @unless(count($transactions) > 0)
        <p class="mt-6">
            {{ __('No transactions were found') }}
        </p>
    @else
        <div id="chart"></div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                let options = {
                    chart: {
                        type: 'bar',
                        toolbar: {
                            show: false
                        },
                        background: 'transparent'
                    },
                    yaxis: {
                        show: false,
                    },
                    xaxis: {
                        labels: {
                            style: {
                                colors: localStorage.theme === 'dark' ? '#FFFFFF' : '#000000'
                            },
                        },
                    },
                    grid: {
                        yaxis: {
                            lines: {
                                show: false
                            }
                        },
                    },
                    series: [{
                        data: @json($transactions, JSON_THROW_ON_ERROR)
                    }],
                    theme: {
                        mode: localStorage.theme ?? 'light'
                    }
                }

                let chart = new ApexCharts(document.querySelector("#chart"), options);

                chart.render();
            })
        </script>
    @endunless
</section>
