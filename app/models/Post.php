<?php

class Post extends Eloquent {

    protected $table = 'posts';

    public function categories()
    {
        return $this->belongsToMany('Category','category_post', 'post_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag', 'post_tag', 'post_id', 'tag_id');
    }

    protected $guarded = array();

	public static $rules = array(
        'title' => 'required',
        'slug' => 'unique:posts,slug',
        'content' => 'required',
        'category' => 'required'



    );

    public static $messages = array(
        'title.required' => 'this is require for post',
        'slug.unique' => 'title has been already been post, please use search for post',
        'content.required' => 'content is required.',
        'categoryName.required' => 'please choose category'


    );

    public static function validate($data)
    {
        $data['slug'] = Str::slug($data['title']);
        return $validation = Validator::make($data, static::$rules, static::$messages);

    }


}
