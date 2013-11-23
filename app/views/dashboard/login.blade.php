@extends('layouts.dashboard')
@section('assets')
    {{-- only include css for login page --}}
    @parent
        {{ HTML::style('_assets/css/signin.css') }}
@stop
@section('content')
    <div class="container">

        {{ Form::open(array('route' => 'loginPost', 'class' =>'form-signin', 'method' =>'post')) }}

            <h2 class="form-signin-heading">Baris's Blog</h2>

            {{ Form::text('username', Input::old('username'),
                array('class' => 'form-control',
                'placeholder' => 'Username', 'autofocus' => 'autofocus')) }}

            {{ Form::password('password',
                array('class' => 'form-control',
                'placeholder' => 'Password')) }}

        {{ Form::submit('Sign In', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        {{ Form::close() }}

    </div> <!-- /container -->
@stop