<?php

namespace Dashboard;

use BaseDashboardController;

use Redirect;
use Post;
use Category;
use Tag;
use View;
use Str;
use Input;
use Request;
use Form;
use Response;
use DB;


Class PostsController extends BaseDashboardController
{



    public function index()
    {

        $posts = Post::all();
        return View::make('dashboard.posts.index', compact('posts'));

    }

    public function create()
    {
        $categories = Category::all();

        $tagsObject = Tag::all(array('name'))->lists('name');

        $tags = json_encode($tagsObject);

        return View::make('dashboard.posts.create',compact('categories', 'tags'));
    }

    public  function store()
    {

        // take to all inputs data
        $inputs = Input::except('_token');

        // use validate
        $validation = Post::validate($inputs);

        // form control
        if ( $validation->fails() ){
            //$findPost = Post::whereSlug(Str::slug($inputs['title']))->firstOrFail();
            return Redirect::route('createToPost')->withErrors($validation)->withInput();
        } else {



            $post = new Post;
            $post->title = $inputs['title'];
            $post->slug = Str::slug($inputs['title']);
            $post->content = $inputs['content'];

            // posts tablosuna inputlardan gelen değerlerin girilmesi.
            $post->save();



            // TAGS
            // check tags input value
            if (!empty ($inputs['tags'])) {

                $tagsData = array();

                // make to array
                $arrayTags = explode(',', $inputs['tags'] );

                foreach($arrayTags as $key => $value) {

                    // check db with input data
                    $checkTags = Tag::whereSlug(Str::slug($value))->first();

                    // not exists in db -> create tag
                    if ($checkTags == false) {
                        $tag = new Tag;
                        $tag->name = $value;
                        $tag->slug = Str::slug($value);
                        $tag->save();
                        $tagsData[] = $tag->id;

                    } else {
                        //$checkData[] = $checkTags->id;

                        // when the tag exists in db, use id
                        $post->tags()->attach($checkTags->id);

                        //$checkData[] = $checkTags->id;

                    }

                }

                // tag not exists in db, create new with tagData values
                $post->tags()->attach($tagsData);
            }
            // category_post tablosuna post_id ve category_id verilerinin girilmesi (radio box input değerini aldık)
            $post->categories()->attach($inputs['category']);


            return Redirect::route('posts')->with('success', 'Post inseterted is succcesfull');
        }
    }

    public function edit($id)
    {
        //$post = Post::find($id);

        $post = Post::with('categories')->where('id', '=', $id)->first();


        $categories = Category::all();


        /**
         * Get single post's tags
         * @param tagFilter Array
         * @param tagData String
         * @param tags JSON
         */
        $tagFilter = DB::table('post_tag')->where('post_id', '=', $id)
            ->join('tags', 'tags.id', '=', 'post_tag.tag_id')
            ->select('tags.name')
            ->lists('name');

        $tagData = trim(implode(',', $tagFilter));



        $tagsObject = Tag::all(array('name'))->lists('name');

        $tags = json_encode($tagsObject);


        /**
         *
         * @param empty array for keeping to category id
         * @param object get Post's categories
         *
        **/

        $checkCategory = array();

        foreach ($post->categories as $cat) {
            $checkCategory[] = $cat->id;

        }



        return View::make('dashboard.posts.edit', compact('post', 'tagData', 'categories', 'tags', 'checkCategory'));


    }

    public  function update($id)
    {
        // take to all inputs data
        $inputs = Input::all();

        // use validate
        $validation = Post::validate($inputs, $id);



        // form control
        if ( $validation->fails() ){
            //$findPost = Post::whereSlug(Str::slug($inputs['title']))->firstOrFail();
            return Redirect::route('editToPost', $id)->withErrors($validation)->withInput();
        } else {

            $post = Post::with('categories')->with('tags')->where('id', '=', $id)->first();

            $post->title = $inputs['title'];
            $post->slug = Str::slug($inputs['title']);
            $post->content = $inputs['content'];

            // posts tablosuna inputlardan gelen değerlerin girilmesi.
            $post->save();



            // TAGS
            // check tags input value
            if (!empty ($inputs['tags'])) {

                $tagsData = array();

                // make to array
                $arrayTags = explode(',', $inputs['tags'] );

                foreach($arrayTags as $key => $value) {

                    // check db with input data
                    $checkTags = Tag::whereSlug(Str::slug($value))->first();

                    // not exists in db -> create tag
                    if ($checkTags == false) {
                        $tag = new Tag;
                        $tag->name = $value;
                        $tag->slug = Str::slug($value);
                        $tag->save();
                        $tagsData[] = $tag->id;

                    } else {
                        //$checkData[] = $checkTags->id;
                        array_push($tagsData, $checkTags->id);
                        // when the tag exists in db, use id
                        $post->tags()->sync($tagsData);

                        //$checkData[] = $checkTags->id;

                    }

                }

                // tag not exists in db, create new with tagData values

                $post->tags()->sync($tagsData);
            }
            // category_post tablosuna post_id ve category_id verilerinin girilmesi (radio box input değerini aldık)
            $post->categories()->attach($inputs['category']);


            return Redirect::route('posts')->with('info', 'Post updated is succcesfull');
        }
    }

    public function insertCategory()
    {

        $inputs = Input::except('_token');


        $validation = Category::validate($inputs);


        if ($validation->fails() ) {


            // AJAX'A DATA ERROR ANAHTARINDAN HATA MESAJLARININ GÖNDERİLMESİ
            $output = array(
            'errors' => $validation->messages()->all()
            );

            return Response::json($output);

        } else {

            $data = Category::create(array(
                    'name' => Input::get('categoryName'),
                    'slug' => Str::slug(Input::get('categoryName'))
            ));

            $categoryId = $data->id;
            $categoryName = Input::get('categoryName'); // input text name

            return View::make('dashboard.ajax.Posts.category', compact('categoryId', 'categoryName'));
        }


    }



}