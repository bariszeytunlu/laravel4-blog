@extends('layouts.dashboard')
@section('assets')
    {{-- only include css for login page --}}
    @parent
        {{ HTML::style('_assets/css/signin.css') }}
@stop
@section('content')
    <div class="container">

        <form class="form-signin">
            <h2 class="form-signin-heading">Baris's Blog</h2>
            <input type="text" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" class="form-control" placeholder="Password" required>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div> <!-- /container -->
@stop