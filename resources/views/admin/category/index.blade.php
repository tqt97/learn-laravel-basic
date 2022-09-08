<x-app-layout>
    <x-slot name="title">
        {{ __('All categories') }}
    </x-slot>

    <x-slot name="header">
        {{ __('All Categories') }}
    </x-slot>

    <a href="{{ route('admin.categories.create') }}"
        class="inline-flex items-center mb-5 px-4 py-2 bg-indigo-700 hover:scale-95 shadow-md hover:shadow-lg border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-indigo-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        <x-icon.plus />
        {{ __('Add new') }}
    </a>
    <a href="{{ route('admin.categories.index') }}?archive"
        class="inline-flex items-center mb-5 px-4 py-2 bg-orange-700 hover:scale-95 shadow-md hover:shadow-lg border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-orange-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">

        <x-icon.archive />{{ __('Archives') }}
    </a>

    @include('admin.category.filter')
    <table class="min-w-max w-full table-responsive-sm  ">
        <thead class="rounded-lg">
            <tr class="bg-gray-800 hover:bg-gray-800 text-gray-50 hover:text-white">
                <th scope="col" class="py-3 pl-3 rounded-tl-lg text-center">
                    <input type="checkbox" name="checkAll" id="">
                </th>
                <th class="py-3 px-1 text-center"> {{ __('No.') }}</th>
                <th class="py-3 px-6 text-left"> {{ __('Name') }}</th>
                <th class="py-3 px-3 text-left"> {{ __('Created at') }}</th>
                <th class="py-3 px-3 text-center"> {{ __('Order at') }}</th>
                <th class="py-3 px-3 text-center"> {{ __('Status') }}</th>
                <th class="py-3 px-3 rounded-tr-lg text-center">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody class="text-gray-800 text-sm font-light">
            @forelse ($categories as $index => $category)
                <tr class="border-b border-gray-200 bg-gray-50 hover:bg-slate-200 hover:shadow-md">
                    <td class="py-3 pl-3 text-center">
                        <input type="checkbox" name="check[]" id="">
                    </td>
                    <td class="py-3 px-1 text-center">
                        {{ $index + $categories->firstItem() }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <img src="{{ $category->getFirstMediaUrl('categories', 'thumb-60') }}"
                                class="w-12 h-12 mr-2"
                                onerror="this.onerror=null;this.src='{{ asset('assets/images/404.webp') }}';"
                                alt="{{ $category->name }}">
                            <span>{{ $category->name }} ({{ $category->childrenCategories()->count() }})</span>
                        </div>
                    </td>
                    <td class="py-3 px-3 text-left">
                        <div class="flex items-center">
                            <span>{{ $category->created_at }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-3 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">
                            {{ $category->order_at }}
                        </span>
                    </td>
                    <td class="py-3 px-3 text-center">
                        <a href=""
                            class="text-center item-center justify-center inline-block hover:scale-110 transition duration-150 ease-in-out w-6 h-6">
                            {!! $category->getStatus() !!}
                        </a>
                    </td>
                    <td class="py-3 pl-3 pr-3 text-center">
                        <div class="flex item-center justify-center">
                            @if ($category->trashed())
                                <div
                                    class="mr-4 transform text-blue-600 hover:text-blue-700 hover:scale-110 transition duration-150 ease-in-out">
                                    <form action="{{ route('admin.categories.post.restore', $category->id) }}"
                                        method="POST" style="display: inline-block;">
                                        @csrf
                                        <button type="submit"
                                            onclick="return confirm('Do you want to restore this item ?')">
                                            <x-icon.undo />
                                            {{-- Restore --}}
                                        </button>
                                    </form>
                                </div>
                                <div
                                    class="transform text-red-600 hover:text-red-700 hover:scale-110 transition duration-150 ease-in-out">
                                    <form action="{{ route('admin.categories.force_delete', $category->id) }}"
                                        method="POST" style="display: inline-block;">
                                        @csrf
                                        <button type="submit"
                                            onclick="return confirm('Do you want to delete forever this item ?')">
                                            <x-icon.archive-box />
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div
                                    class="mr-4 transform text-blue-600 hover:text-cyan-700 hover:scale-110 transition duration-150 ease-in-out">
                                    <a href="{{ route('admin.categories.edit', $category) }}">
                                        <x-icon.edit />
                                    </a>
                                </div>
                                <div
                                    class="transform text-red-600 hover:text-red-700 hover:scale-110 transition duration-150 ease-in-out">
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Do you want to delete this item ?')">
                                            <x-icon.trash />
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">
                        <div class="text-gray-500 text-center font-bold mt-6">
                            {{ __('No data were found...') }}</div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-5 mx-2">
        {{ $categories->appends($_GET)->links() }}
    </div>

</x-app-layout>
