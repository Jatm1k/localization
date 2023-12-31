<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()->latest()->paginate(10);
        return view('blog.index', compact('posts'));
    }
}
