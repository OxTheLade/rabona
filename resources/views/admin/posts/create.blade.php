@extends('layouts.admin')







@section('content')

    @include('admin.includes.ckeditor')

    <h1>Create Post</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

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
                    {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>




@stop