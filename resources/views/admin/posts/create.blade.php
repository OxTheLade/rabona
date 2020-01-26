@extends('layouts.admin')







@section('content')

    @include('admin.includes.ckeditor')

    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header mb-2">
                        <h1>Create Post</h1>
                    </div>
                    <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

                    @csrf <!-- {{ csrf_field() }} -->

                        <div class="form-group">
                            {!! Form::label('title', 'Title:') !!}
                            {!! Form::text('title', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('post_type', 'Type of post:') !!}
                            {!! Form::select('post_type', [''=>'Choose Type', 0 => 'Football news', 1 => 'Football Rumours'], null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('category_id', 'Category:') !!}
                            {!! Form::select('category_id', [''=>'Choose Categories', 1=>'Test'], null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('is_important', 'Big or small news?:') !!}
                            {!! Form::select('is_important', [''=>'Choose Type', 0 => 'Non important news', 1 => 'Important news'], null, ['class'=>'form-control']) !!}
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
            <div class="col-md-3">


                @include('admin.includes.form_error')


            </div>
        </div>
    </div>







@stop