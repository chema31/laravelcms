<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isAdminOrEditor()) {
            $posts = Post::paginate(Config::get('app.pagination'));

        } else {
            $posts = Auth::user()->posts()->paginate(Config::get('app.pagination'));
        }

        return view('admin.posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        Auth::user()->posts()->save(new Post($request->only(['title','slug','body','excerpt','published_at'])));

        return redirect()->route('posts.index')->with('status', 'The post has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit')->with('model',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if(Auth::user()->cant('update',$post)){
            return redirect()->route('posts.index')->with('status', 'You do not have enought permissions to execute this action');
        }

        $post->fill($request->only(['title','slug','published_at','body','excerpt']))->save();

        return redirect()->route('posts.index')->with('status', 'The post was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(Auth::user()->cant('delete',$post)){
            return redirect()->route('posts.index')->with('status', 'You do not have enought permissions to execute this action');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('status', 'The post was deleted');
    }
}
