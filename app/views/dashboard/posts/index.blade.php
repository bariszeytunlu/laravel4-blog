@extends('dashboard.layouts.dashboard')

@section('content')
    <h3><span class="glyphicon glyphicon-pushpin"></span> POSTS</h3>

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
            <button type="button" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-danger">Destroy</button>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>


@stop