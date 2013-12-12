@extends('dashboard.layouts.dashboard')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success"> {{ Session::get('success') }} </div>
    @endif


    <h3><span class="glyphicon glyphicon-pushpin"></span> POSTS
    {{ link_to_route('createToPost', 'New Post', array(), array('class' => 'btn btn-success')) }} </h3>

<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Category</th>
        <th>Comments</th>
        <th class="col-md-2">Edit</th>
    </tr>
    </thead>
    <tbody>

    @foreach($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td></td>
        <td></td>
        <td>

            {{ link_to_route('editToPost', 'Edit', array('id' => $post->id),
            array('type' => 'button', 'class' => 'btn btn-primary')) }}

            <button type="button" class="btn btn-danger">Destroy</button>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>


@stop