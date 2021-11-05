<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($posts) === 0)
                    <div class="flex flex-col items-center justify-center pt-5">
                        You have no posts yet.
                        <a href="{{ route('new-post') }}"
                            class="mt-3 w-auto bg-indigo-700 border border-transparent rounded-sm py-2 px-8 flex items-center justify-center font-semibold text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add Post
                        </a>
                    </div>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($posts as $post)
                        <div class="flex items-center justify-between">
                            <div class="font-semibold text-md">
                                <a class="hover:text-indigo-500"
                                    href="/posts/{{ $post->slug }}">
                                    {{ $post->title }}
                                </a>
                            </div>
                            <div class="flex">
                                <a href="/edit/{{ $post->slug }}"
                                   class="mt-3 w-auto bg-yellow-500 border border-transparent rounded-sm py-2 px-8 flex items-center justify-center font-semibold text-sm text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                    Edit
                                </a>
                                <a href="/delete/{{ $post->slug }}"
                                   class="mt-3 ml-2 w-auto bg-red-600 border border-transparent rounded-sm py-2 px-8 flex items-center justify-center font-semibold text-sm text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Delete
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if(count($posts) > 10)
                    <div class="m-3">
                        {{ $posts->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
