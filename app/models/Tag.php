<?php

class Tag extends Eloquent {


    protected $table = "tags";

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany('Post');
    }

    protected $guarded = array();

	public static $rules = array(


    );

    public static $messages = array(

    );

    public static function validate($data)
    {
        return $validation = Validator::make($data, static::$rules, static::$messages);

    }




}
