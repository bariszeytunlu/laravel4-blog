<?php

class Category extends Eloquent {

    protected $table = "categories";




    public function posts()
    {
        return $this->belongsToMany('Post');
    }

    protected $guarded = array();

    public static $rules = array(
        'categoryName' => 'required',
        'slug' => 'unique:categories,slug'
    );

    public static $messages = array(
        'categoryName.required' => 'Lütfen kategori  seçiniz.',
        'slug.unique' => 'Bu isimde kategori zaten mevcut.'
    );

    public static function validate($data)
    {
        $data['slug'] = Str::slug($data['categoryName']);

        //dd($data);
        return $validation = Validator::make($data, static::$rules, static::$messages);

    }




}
