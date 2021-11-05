<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                            {{ $post->title }}
                        </h1>
                        <p class="mb-8 leading-relaxed">
                            {{ $post->text }}
                        </p>
                        <div class="flex">
                            <a href="/edit/{{ $post->id }}" class="mt-3 w-auto bg-yellow-500 border border-transparent rounded-sm py-2 px-8 flex items-center justify-center font-semibold text-sm text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                Edit
                            </a>
                            <a href="/delete/{{ $post->id }}" class="mt-3 ml-2 w-auto bg-red-600 border border-transparent rounded-sm py-2 px-8 flex items-center justify-center font-semibold text-sm text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
