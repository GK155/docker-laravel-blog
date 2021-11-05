<div class="max-w-xl mx-auto">
    <div class="w-full flex flex-wrap justify-center align-center mt-10 bg-gray-100">

        @if(count($comments) === 0)
            <div class="bg-gray-100">
                No comments yet.
            </div>
        @endif
        @foreach($comments as $comment)
            <div class="p-4 my-2 mx-0.5 w-full flex flex-col border bg-white relative">
                <div>
                    <h5 class="flex font-semibold">
                        <div class="border rounded-full bg-current w-6 h-6 flex items-center justify-center mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="z-10 h-4 w-4" fill="none" viewBox="0 0 24 24"
                                 stroke="#fefefe">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>

                        <a>{{ $comment->author->name }}</a>
                    </h5>
                </div>
                <span class="mt-2 block text-gray-400 text-xs">
                    Published <time>{{ $comment->created_at->diffForHumans() }}</time>
                </span>
                <div class="flex items-center">
                    {!! $comment->text !!}
                </div>
                @auth
                    @if($comment->author->id === Auth::user()->id)
                        <a href="/comments/delete/{{ $comment->id }}" class="w-auto absolute right-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="red">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>

{{--    <div class="mt-10">--}}
{{--        {{ $comments->links() }}--}}
{{--    </div>--}}
</div>
