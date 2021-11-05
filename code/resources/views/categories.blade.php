<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('updated'))
                        <div class="alert alert-success mb-10">
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                                <p class="font-bold">{{ session('updated') }}</p>
                            </div>
                        </div>
                    @endif

                    @if (session('delete-error'))
                        <div class="alert alert-error mb-10">
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                                <p class="font-bold">{{ session('delete-error') }}</p>
                            </div>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success mb-10">
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                                <p class="font-bold">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Add new category
                    </h2>
                    <x-add-category-form/>

                    <x-categories-list :categories="$categories"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
