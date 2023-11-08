<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\SavePostRequest;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()->latest('id')->paginate(15);
        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'post' => new Post(),
        ]);
    }

    public function store(SavePostRequest $request)
    {
        Post::query()->create($request->validated());
        return to_route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(SavePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return to_route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.posts.index');
    }
}
