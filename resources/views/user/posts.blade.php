<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5"><a href="{{ route('post.create') }}" class="mb-3 bg-green-500 px-5 py-3 rounded">Create
                    post</a></div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(count($posts))
                        @foreach($posts as $post)
                            <div class="flex justify-between">
                                <span class="mb-3 text-xl">{{ $post->title }}</span>
                                <span
                                    class="text-gray-400 align-bottom text-sm">{{ $post->created_at->format('H:i d/m/y') }}</span>
                            </div>
                            <div class="mb-3">{!! substr($post->content, 0, 200) !!}</div>
                            <div class="flex justify-between">
                                <form action="{{ @route('post.destroy', $post->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="bg-transparent text-red-500" value="Delete">
                                </form>
                            </div>
                        @endforeach
                    @else
                        no posts!
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
