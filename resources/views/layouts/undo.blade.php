@if (session()->has('undo'))
    <div class="pt-5" x-cloak x-data="{
        isOpen: true,
        secondsLeft: 20
    }" x-init="window.setInterval(() => { if (secondsLeft > 0) secondsLeft = secondsLeft - 1; }, 1000), setTimeout(() => isOpen = false, 20000)" x-show="isOpen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="py-3 px-5 shadow-lg bg-white border-b border-gray-200">
                    <div x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform translate-x-8"
                        x-transition:enter-end="opacity-100 transform translate-x-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform translate-x-0"
                        x-transition:leave-end="opacity-0 transform translate-x-8"
                        @keydown.escape.window="isOpen = false" class="z-20 flex justify-between">

                        <div class="flex items-center">
                            <svg class="text-green-500 h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="font-semibold text-gray-500 text-sm sm:text-base ml-2">
                                {!! session('undo') !!}
                                (<span x-text="secondsLeft" class="text-sm text-indigo-600"></span>s)
                            </div>
                        </div>
                        <button @click="isOpen = false" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
