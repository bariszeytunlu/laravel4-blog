<?php

namespace Dashboard;

use BaseDashboardController;

use Post;
use View;

Class PostsController extends BaseDashboardController
{

    public function index()
    {

        $posts = Post::all();
        return View::make('dashboard.posts.index', compact('posts'));

    }


}