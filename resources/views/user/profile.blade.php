<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $profile->name }}'s profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold mb-5 text-lg text-gray-800 leading-tight">Posts</h3>
                    @if(count($profile->posts))
                        @foreach($profile->posts as $post)
                            <div class="flex justify-between">
                                <span class="mb-3 text-xl">{{ $post->title }}</span>
                                <span
                                    class="text-gray-400 align-bottom text-sm">{{ $post->created_at->format('H:i d/m/y') }}</span>
                            </div>
                            <div class="mb-3">{!! substr($post->content, 0, 200) !!}</div>
                            <div class="flex justify-end">
                                <a href="{{ route('post.show', $post->id) }}" class="bg-green-500 px-5 py-3">Read
                                    more</a>
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
