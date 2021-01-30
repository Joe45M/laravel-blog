<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreatePostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->middleware('owns.post')->only('destroy');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Auth::user()->posts;
        return view('user.posts', ['posts' => $posts]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('user.posts-create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $user_id = Auth::id();

        // Create post
        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->user_id = $user_id;


        if ($post->save()) {
            return redirect(route('post.index'))->with(['success' => 'Post created!']);
        }

        return redirect(route('post.create'))->with(['error' => 'Post not created.']);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route('post.index'))->with(['success' => 'post deleted!']);
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->first();

        if (!$post) {
            abort(404);
        }

        return view('post.detail-post', [
            'post' => $post,
        ]);

    }

}
