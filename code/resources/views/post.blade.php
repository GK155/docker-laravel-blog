<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-indigo-600	font-semibold w-auto py-1">
                        <a class="bg-indigo-300 text-indigo-800 px-2 rounded-sm py-1"
                            href="/categories/{{ $category->slug }}">
                            {{ $category->title }}
                        </a>
                    </div>
                    <div>
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                            {{ $post->title }}
                        </h1>
                        <p class="mb-8 leading-relaxed">
                            {{ $post->text }}
                        </p>
                        @if(isset($post->avatar))
                            <img src="{{ asset('/storage/' . $post->avatar) }}"/>
                        @endif


                        <div class="font-medium text-gray-500">
                            Visits counter: {{ $postViews }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @auth
        <x-comment-form :id="$post->id"/>
    @endauth

    @guest
        <div class="flex justify-center">
            <a class="text-indigo-600 font-semibold mr-1"
               href="{{ route('login') }}">
                Log in
            </a>
            to comment.
        </div>
    @endguest

    <x-comments-section :comments="$comments"/>
</x-app-layout>

