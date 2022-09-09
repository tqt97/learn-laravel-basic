<li class="w-full relative">
    <div class="flex hover:shadow-sm shadow-xs p-1 border-b border-gray-100">
        <span class="branch  justify-start w-full">
            <i class="fa fa-folder-o"></i> {{ $category->name }} ({{ $category->children_count }} sub categories)
        </span>
        <span class="flex justify-end w-full">
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
                        <form action="{{ route('admin.categories.post.restore', $category->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            <button type="submit" onclick="return confirm('Do you want to restore this item ?')">
                                <x-icon.undo />
                            </button>
                        </form>
                    </div>
                    <div
                        class="transform text-red-600 hover:text-red-700 hover:scale-110 transition duration-150 ease-in-out">
                        <form action="{{ route('admin.categories.force_delete', $category->id) }}" method="POST"
                            style="display: inline-block;">
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
                            <button type="submit" onclick="return confirm('Do you want to delete this item ?')">
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

{{-- </ul> --}}

{{-- <ul class="tree">
    <li class="bg-slate-300 p-1 border ">
        <span class="branch"><i class="fa fa-folder-o"></i> {{ $category->name }} ({{ $category->id }})</span>
        @foreach ($category->children as $child)
            @include('admin.category.sub', ['category' => $child])
        @endforeach
    </li>
</ul> --}}
