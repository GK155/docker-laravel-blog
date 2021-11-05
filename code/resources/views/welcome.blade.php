<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog posts') }}
        </h2>
    </x-slot>

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
                    <a href="/posts/{{ $post->slug }}" class="mt-3 text-indigo-600 inline-flex items-center">
                        Read More
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="w-full mt-10">
        {{ $posts->links() }}
    </div>

</x-app-layout>
