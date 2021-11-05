<div class="w-full">
    <form action="/create" method="post" enctype="multipart/form-data" class="flex-col justify-center items-center">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="block text-sm font-medium text-gray-700 mt-5">
            <input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text"
                   name="title"
                   class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-3 sm:text-sm border-gray-300 rounded-md"/>
            @error('title')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
        </div>

        <select name="category_id" class="text-sm rounded-md text-indigo-700 mt-2 border-gray-300">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" class="text-sm text-indigo-700 ">{{ $category->title }}</option>
            @endforeach
        </select>
            @error('category_id')
                <div class="text-sm alert alert-danger text-red-700">{{ $message }}</div>
            @enderror

        <div class="mt-3">
            <textarea name="text"
                      rows="6"
                      placeholder="Enter text here"
                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ old('body') }}</textarea>

        </div>

        <div class="block text-sm font-medium text-gray-700 mt-5">
            <input type="file"
                   name="avatar"
                   class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-3 sm:text-sm border-gray-300 rounded-md"/>

            {!!$errors->first('avatar', '<span class="text-danger">:message</span>')!!}
        </div>

        <input type="submit"
               class="mt-3 w-auto bg-indigo-700 border border-transparent rounded-sm py-2 px-8 flex items-center justify-center font-semibold text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               value="Add Post"/>

    </form>
</div>
