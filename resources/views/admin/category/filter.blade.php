<div class="mb-5" x-data="{ showSearchButton: false, showClearButton: false, keywords: '' }">
    <form class="flex items-center" action="{{ route('admin.categories.index') }}">
        <label for="search" class="sr-only">Search</label>
        <div class="relative w-full group">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <x-icon.search class="text-gray-500 dark:text-gray-400" />
            </div>
            <input type="text" id="search" name="search" x-model="keywords"
                x-on:keyup=" if(keywords.length > 1) {showSearchButton = true,showClearButton = true} else {showSearchButton = false,showClearButton = false}"
                class="group font-semibold text-md bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                @if (request()->get('search'))
            value="{{ request()->get('search') }}"
            @endif
            placeholder="Search by name ..."
            >
            <button type="reset" :class="showClearButton ? 'flex' : 'hidden'"
                x-on:click="showSearchButton = false,showClearButton = false"
                class="flex py-2.5 px-2.5 absolute inset-y-0 right-10 items-center pr-3 transition ease-in-out duration-250">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </button>
            <button type="submit" :class="showSearchButton ? 'flex' : 'hidden'"
                class="bg-gray-500 opacity-50 group-focus:bg-indigo-600 scale-90  group-hover:scale-100 group-hover:bg-indigo-600 group-hover:opacity-100 rounded-r-lg py-2.5 px-2.5 absolute inset-y-0 right-0 items-center pr-3 transition ease-in-out duration-250">
                <x-icon.filter />
            </button>
        </div>

        <a href="{{ route('admin.categories.index') }}" title="Reset filter"
            class="inline-flex items-center py-2.5 px-2.5 ml-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            <x-icon.reset />
        </a>
    </form>
</div>
