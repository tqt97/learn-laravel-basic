<div class="mb-5">
    <form class="flex items-center" action="{{ route('categories.index') }}">
        <label for="search" class="sr-only">Search</label>
        <div class="relative w-full group">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <x-icon.search class="text-gray-500 dark:text-gray-400" />
            </div>
            <input type="text" id="search" name="search"
                class="group font-semibold text-md bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                @if (request()->get('search')) value="{{ request()->get('search') }}" @endif
                placeholder="Search by name ...">
            <button type="submit"
                class="bg-gray-500 opacity-50 group-focus:bg-indigo-600 scale-90  group-hover:scale-100 group-hover:bg-indigo-600 group-hover:opacity-100 rounded-r-lg py-2.5 px-2.5 flex absolute inset-y-0 right-0 items-center pr-3 transition ease-in-out duration-250">
                <x-icon.filter />
            </button>
        </div>

        <a href="{{ route('categories.index') }}" title="Reset filter"
            class="inline-flex items-center py-2.5 px-2.5 ml-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            <x-icon.reset />
        </a>
    </form>
</div>
