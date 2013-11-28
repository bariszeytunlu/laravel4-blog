@extends('dashboard.layouts.dashboard')


    @section('content')
        {{ Form::model($post, array('route' => array('uptadeToPost', $post->id), 'enctype' => 'multipart/form-data', 'files' => 'true')) }}
                <div class="form-group">
                    {{ Form::textarea('content', Input::old('content'),
                    array('class' => 'tinymceScreen', 'id' => 'editor1'))}}
                </div>
        {{Form::submit('Kaydet', array('class' => 'btn btn-success'))}}
        {{ Form::close() }}

    @stop
