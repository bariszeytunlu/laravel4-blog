@extends('dashboard.layouts.dashboard')


    @section('content')
    <div class="col-lg-8 pull-left">
        {{ Form::model($post, array('route' => array('uptadeToPost', $post->id), 'method' => 'PATCH', 'enctype' => 'multipart/form-data', 'files' => 'true')) }}


            {{-- ERROR MESSAGES --}}
            @foreach($errors->all() as $messages)
            <div id="alert-message" class="alert alert-warning"> {{ $messages }} </div>
            @endforeach

            <div class="form-group">
                {{ Form::text('title', Input::old('title'),
                array('class' => 'form-control', 'placeholder' => 'Title')) }}
            </div>

            <div class="form-group">
                {{ Form::textarea('content', Input::old('content'),
                array('class' => 'tinymceScreen', 'id' => 'editor1'))}}
            </div>
            <div class="form-group">
                {{Form::submit('Save', array('class' => 'btn btn-success'))}}
            </div>


            {{-- ETİKETLER --}}
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-tags"> </span>
                        Etiketler
                    </h3>

                </div>
                <div class="panel-body">

                    <input type="text" name="tags" class="form-control" id="tokenfield" value="{{ $tagData }}" />

                </div>
            </div>
            </div>


            <div class="col-lg-4 pull-right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-folder-open">
                            Categories
                        </h3>
                    </div>
                    <div class="panel-body">

                        <div class="panel-items">
                            @foreach( $categories as $row )

                                {{ View::make('dashboard.ajax.Posts.category', array('categoryId' => $row->id, 'categoryName' => $row->name, 'checked' => in_array($row->id, $checkCategory))) }}


                            @endforeach
                        </div>
                        <br />



                        {{ Form::close() }}
                        <div class="form-group">

                            {{ Form::open(array('action' => 'Dashboard\PostsController@insertCategory', 'id' => 'categoryForm')) }}

                            {{ Form::text('categoryName', Input::old('categoryName'),
                            array('class' => 'form-control','id' => 'category', 'placeholder' => 'Add to new category') ) }}
                        </div>


                        {{-- AJAX ERRORS OUTPUT AREA --}}
                        <div class="errors"></div>

                        <div class="form-group">

                            {{ Form::submit('Add', array('class' => 'btn btn-info', 'id' => 'addCategory')) }}
                        </div>


                        {{ Form::close() }}
                    </div>

                </div>

            </div>
    </div>

            @stop

            @section('scripts')
            {{-- INCLUDE AJAX/JQERY FILE  --}}
            @parent
            {{ HTML::script('_assets/js/ajax.js') }}
            <script type="text/javascript">

                // ERROR MESSAGES
                var duration = 5000;
                $('div[id="alert-message"]').each(function() {
                    $(this).delay(duration).slideUp();
                    duration = 3000 + duration;
                });


                $('#tokenfield').tokenfield({
                    autocomplete: {
                        source: {{$tags}},
                delay: 100
                },
                showAutocompleteOnFocus: true
                })

            </script>



            @stop

    @stop
