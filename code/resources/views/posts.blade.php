<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="max-w-6xl mx-auto py-12 sm:px-6 lg:px-8">
        @if (session('updated'))
            <div class="alert alert-success mb-10">
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                    <p class="font-bold">{{ session('updated') }}</p>
                </div>
            </div>
        @endif

        @if (session('deleted'))
            <div class="alert alert-success mb-10">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                    <p class="font-bold">{{ session('deleted') }}</p>
                </div>
            </div>
        @endif

        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6 bg-white border-b border-gray-200">
            @foreach($posts as $post)
                <div class="p-4 md:w-1/3 flex">
                    <div class="flex-grow pl-6">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-2">
                            {{ $post->title }}
                        </h2>
                        <div class="max-h-32 overflow-hidden">
                            <p class="leading-relaxed text-base overflow-ellipsis line-clamp-3">
                                {{ $post->text }}
                            </p>
                        </div>

                        <a href="/posts/{{ $post->id }}" class="mt-3 text-indigo-500 inline-flex items-center">Learn
                            More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
