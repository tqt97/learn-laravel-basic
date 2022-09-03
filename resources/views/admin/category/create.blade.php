<x-app-layout>
    <x-slot name="title">
        {{ __('Add category') }}
    </x-slot>

    <x-slot name="header">
        {{ __('Add category') }}
    </x-slot>

    @include('admin.category.css')

    <x-container>

        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <x-label for="name" value="{{ __('Name') }}" required />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                    <x-input-error for="name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-label for="slug" value="{{ __('Slug') }}" required />
                    <x-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')"
                        disabled />
                    <x-input-error for="slug" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-label for="parent_id" value="{{ __('Category') }}" />
                    <x-select name="parent_id" id="parent_id">
                        <option value="">--Select category--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="parent_id" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-label for="order_at" value="{{ __('Order at') }}" />
                    <x-input id="order_at" class="block mt-1 w-full" type="text" name="order_at" :value="old('order_at') ?? 0"
                        placeholder="default 0" />
                    <x-input-error for="order_at" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-6 gap-6 mt-4">
                <div class="col-span-6 sm:col-span-3">
                    <div class="flex items-center">
                        <div class="flex h-10 items-center">
                            <x-checkbox id="status" name="status" value="1"
                                class="h-5 w-5 text-green-600 focus:ring-green-500" />
                        </div>
                        <div class="ml-3">
                            <x-label for="status" value="{{ __('Status') }}" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <x-button> {{ __('Save') }} </x-button>
            </div>
        </form>

    </x-container>

    @include('admin.category.js')

</x-app-layout>
