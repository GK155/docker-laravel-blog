<div class="flex flex-col items-center justify-center">
    <h2 class="text-lg">Add new comment</h2>
    <form action="/comments/create" method="post" class="max-w-xl w-full flex-col justify-center items-center">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="post_id" value="{{ $id }}">
        <div class="mt-3">
            <textarea name="text"
                      rows="6"
                      id="comment-form"
                      placeholder="Enter text here"
                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
        </div>
        <input type="submit"
               class="mt-3 w-auto bg-indigo-700 border border-transparent rounded-sm py-2 px-8 flex items-center justify-center font-semibold text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               value="Add Comment"/>
    </form>
</div>
