<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold mb-5 text-lg text-gray-800 leading-tight">Create post</h3>
                    <form action="{{ route('post.store') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="flex flex-col mb-4">
                            <label for="title" class="mb-2">Post title</label>
                            <input type="text" name="title" id="title" class="p-2 border-gray-300 rounded">
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="content" class="mb-2">Post content</label>
                            <textarea type="text" name="content" id="content"
                                      class="p-2 border-gray-300 rounded" rows="5"> </textarea>
                        </div>
                        <div class="flex justify-end mb-4">
                            <input type="submit" name="submit" value="Create post"
                                   class="px-5 py-2 bg-green-500 rounded cursor-pointer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
