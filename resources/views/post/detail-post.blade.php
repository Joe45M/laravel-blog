<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row">
                <div class="w-100 lg:w-1/4 px-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <img class="mx-auto mb-5 rounded-full" src="{{ $post->user->ui_picture }}" alt="">
                            <div class="text-xl w-100 text-center mb-3">{!! $post->user->name !!}</div>
                            <div class="text-sm w-100 text-center text-gray-500">
                                Joined {!! $post->user->created_at->format('F Y') !!}</div>
                        </div>
                    </div>
                </div>
                <div class="w-100 lg:w-3/4 px-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="mb-5">
                                {!! $post->content !!}
                            </div>
                            <hr class="mb-3">
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Posted {{ $post->created_at->format('H:i d/m/y') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="mb-5">
                                <div class="text-xl mb-3">Comments</div>
                            </div>
                            <hr class="mb-3">
                            @if($post->comments)
                                @foreach($post->comments as $comment)

                                    <div class="flex justify-between text-sm text-gray-500 mb-3">
                                        <span>{{ $comment->user->name }}</span>
                                        <span>Posted {{ $post->created_at->format('H:i d/m/y') }}</span>
                                    </div>
                                    <div>
                                        {!! $comment->content !!}
                                    </div>
                                @endforeach
                            @else
                                no comments
                            @endif
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="mb-5">
                                <div class="text-xl mb-3">Post comment</div>
                            </div>
                            <hr class="mb-3">
                            @if(Auth::user())
                                <form action="{{ route('comment.store') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="flex flex-col mb-4">
                                        <label for="content" class="mb-2">Comment</label>
                                        <input type="hidden" name="post" value="{{ $post->id }}">
                                        <textarea type="text" name="content" id="content"
                                                  class="p-2 border-gray-300 rounded" rows="5"> </textarea>
                                    </div>
                                    <div class="flex justify-end mb-4">
                                        <input type="submit" name="submit" value="Create post"
                                               class="px-5 py-2 bg-green-500 rounded cursor-pointer">
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
