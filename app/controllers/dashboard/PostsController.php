<?php

namespace Dashboard;

use BaseDashboardController;

use Post;
use View;
use Str;
use Input;

Class PostsController extends BaseDashboardController
{

    public function index()
    {

        $posts = Post::all();
        return View::make('dashboard.posts.index', compact('posts'));

    }

    public function create()
    {
        return View::make('dashboard.posts.create');
    }

    public  function store()
    {
        $post = new Post;
        $post->title = 'Test elfinder';
        $post->slug = Str::slug('Test elfinder');
        $post->content = Input::get('content');
        $post->save();
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return View::make('dashboard.posts.edit', compact('post'));
    }

    public  function update($id)
    {
        $post = Post::find($id);

        $post->content = Input::get('content');
        $post->save();
    }


}