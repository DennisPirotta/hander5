<div id="speed-dial-menu-bottom-right" class="flex hidden flex-col items-center mb-4 space-y-2">
    <a href="{{ $route }}" data-tooltip-target="tooltip-share" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
        {!! $icon !!}
        <span class="sr-only">Share</span>
    </a>
    <div id="tooltip-share" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 w-auto text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
        {{ $tooltip }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>