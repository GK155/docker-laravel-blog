<div class="flex flex-col">
    <h1 class="text-indigo-700 text-xl text-center text-semibold my-2">Categories</h1>
    <div class="flex flex-col">
        @foreach($categories as $category)
            <div class="w-auto relative flex justify-between bg-indigo-400 p-2 mx-2 my-1 rounded-sm">
                <a class="text-white font-semibold" href="/categories/{{ $category->slug }}">
                    {{ $category->title }}


                </a>
                <a class="absolute right-10" href="/categories/edit/{{ $category->slug }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#E0E7FF">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a class="absolute right-2" href="/categories/delete/{{ $category->slug }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#E0E7FF">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

        @endforeach
    </div>
</div>
