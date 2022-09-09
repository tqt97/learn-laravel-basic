<x-app-layout>
    <x-slot name="title">
        {{ __('All categories') }}
    </x-slot>

    <x-slot name="header">
        {{ __('All Categories') }}
    </x-slot>
    <div class="border-b">
        <a href="{{ route('admin.categories.create') }}"
            class="inline-flex items-center mb-5 px-4 py-2 bg-indigo-700 hover:scale-95 shadow-md hover:shadow-lg border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-indigo-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            <x-icon.plus />
            {{ __('Add new') }}
        </a>
        @if (url()->full() === request()->root() . '/admin/categories')
            <a href="{{ route('admin.categories.index') }}?archive"
                class="inline-flex items-center mb-5 px-4 py-2 bg-orange-700 hover:scale-95 shadow-md hover:shadow-lg border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-orange-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                <x-icon.archive />{{ __('Archives') }}
            </a>
        @endif
        @if (url()->full() === request()->root() . '/admin/categories?archive=')
            <a href="{{ route('admin.categories.index') }}"
                class="inline-flex items-center mb-5 px-4 py-2 bg-green-700 hover:scale-95 shadow-md hover:shadow-lg border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-green-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                <x-icon.list-all />{{ __('List all') }}
            </a>
        @endif
    </div>
    <div class="menu">
        @if ($categories->count() > 0)

            <ul class="tree">
                @foreach ($categories as $category)
                    <li class="w-full ">
                        <div class="flex hover:shadow-sm rounded-lg shadow-xs p-1 border-b border-gray-100">

                            <span class="branch flex justify-start w-full items-center">
                                <i class="fa fa-folder-o"></i> {{ $category->name }} ({{ $category->children_count }}
                                sub
                                categories)
                            </span>
                            <span class="flex justify-end items-center w-full">
                                <div class="flex item-center justify-center">
                                    <div class="mr-4 transform text-black  transition duration-150 ease-in-out">
                                        {{ $category->created_at->diffForHumans() }}
                                    </div>
                                    <div
                                        class="mr-4 transform text-blue-600 hover:text-blue-700 hover:scale-110 transition duration-150 ease-in-out">
                                        {!! $category->getStatus() !!}
                                    </div>
                                    @if ($category->trashed())
                                        <div
                                            class="mr-4 transform text-blue-600 hover:text-blue-700 hover:scale-110 transition duration-150 ease-in-out">
                                            <form action="{{ route('admin.categories.post.restore', $category->id) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Do you want to restore this item ?')">
                                                    <x-icon.undo />
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
                                            <form action="{{ route('admin.categories.destroy', $category) }}"
                                                method="POST" style="display: inline-block;">
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
                            </span>
                        </div>
                        @if ($category->children)
                            <ul class="tree">
                                @foreach ($category->children as $child)
                                    @include('admin.category.sub', ['category' => $child])
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>No data</p>
        @endif
    </div>
    @include('admin.category.css')
    <script>
        document.querySelector('.branch').click(function() {
            console.log('abc');
            document.querySelector(this).children().classList.toggle('fa-folder-open-o');
            document.querySelector(this).nextElementSibling.slideToggle();
        });
    </script>
</x-app-layout>
