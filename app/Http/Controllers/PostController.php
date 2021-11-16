<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, User, Category};

class PostController extends Controller
{
    public function index(Request $request)
    {
        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        } elseif (request('author')) {
            $author = User::where('username', request('author'))->first();
            $title = ' by ' . $author->name;
        }

        $post = Post::latest();

        return view('posts', [
            'title' => 'All Posts' . $title,
            'posts' => $post->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {

        return view('post', [
            'title' => 'Post',
            'post' => $post
        ]);
    }
}
