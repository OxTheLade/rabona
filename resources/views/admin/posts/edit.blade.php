@extends('layouts.admin')



@section('content')

    @include('admin.includes.ckeditor')

    <section id="edit_post">
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Post Photo</h1>
                    </div>
                    <img src="{{$post->photo->path}}" alt="" class="img-fluid card-img-top">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mb-2">
                        <h1>Update Post</h1>
                    </div>
                {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

                @csrf <!-- {{ csrf_field() }} -->

                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id', 'Category:') !!}
                        {!! Form::select('category_id', [''=>'Choose Categories', 1=>'Test'], null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('photo_id', 'Photo:') !!}
                        {!! Form::file('photo_id', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('preview', 'Preview:') !!}
                        {!! Form::text('preview', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('body', 'Description:') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
                        <script>
                            CKEDITOR.replace('body');
                        </script>

                    </div>


                        <div class="form-group">
                            {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-md-6']) !!}
                        </div>
                    {!! Form::close() !!}


                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

                    @csrf <!-- {{ csrf_field() }} -->


                        <div class="form-group">

                            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-md-6 float-right']) !!}
                        </div>

                        {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    </section>







@stop