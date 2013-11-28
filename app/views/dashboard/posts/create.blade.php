@extends('dashboard.layouts.dashboard')


    @section('content')
        {{ Form::open(array('route' => 'storeToPost', 'enctype' => 'multipart/form-data', 'files' => 'true', 'class' => 'col-lg-8')) }}

        <div class="form-group">
        {{ Form::text('title', Input::old('title'),
            array('class' => 'form-control', 'placeholder' => 'Title')) }}
        </div>

        <div class="form-group">
            {{ Form::textarea('content', Input::old('content'),
            array('class' => 'tinymceScreen', 'id' => 'editor1'))}}
        </div>
        {{Form::submit('Kaydet', array('class' => 'btn btn-success'))}}
        {{ Form::close() }}

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Categories</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div>
    @stop
