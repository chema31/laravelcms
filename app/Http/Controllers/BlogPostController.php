<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $published = Post::with('user')
                            //->where('published_at','<', Carbon::now())
                            ->orderBy('published_at','desc')
                            ->paginate(15);

        return view('blog.index')->with('posts', $published);
    }

    public function show($slug)
    {
        $post = Post::with('user')
            ->where([
                ['slug','=', $slug],
                //['published_at','<', Carbon::now()]
            ])
            ->firstOrFail();

        return view('blog.show')->with('post', $post);
    }
}
