@extends('layouts.author')

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
                        <div class="card-body">
                            @include('admin.includes.form_error')
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header mb-2">
                            <h1>Update Post</h1>
                        </div>
                        <div class="card-body">

                        {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AuthorPostsController@update', $post->id], 'files'=>true]) !!}

                        @csrf <!-- {{ csrf_field() }} -->

                            <div class="form-group">
                                {!! Form::label('title', 'Title:') !!}
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('post_type', 'Type of post:') !!}
                                {!! Form::select('post_type', [0 => 'Football news', 1 => 'Football Rumours'], null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('category_id', 'Category:') !!}
                                {!! Form::select('category_id', [''=>'Choose Categories', 1=>'Test'], null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('is_important', 'Big or small news?:') !!}
                                {!! Form::select('is_important', [0 => 'Non important news', 1 => 'Important news'], null, ['class'=>'form-control']) !!}
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::button('<i class="fas fa-check"></i> Save Changes', ['type'=>'submit','class'=>'btn btn-success btn-block col-md-6']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}


                        {!! Form::open(['method'=>'DELETE', 'action'=>['AuthorPostsController@destroy', $post->id]]) !!}

                        @csrf <!-- {{ csrf_field() }} -->

                            <div class="col-md-6">
                                <div class="form-group">

                                    {!! Form::button('<i class="fas fa-trash"></i> Delete Post', ['type'=>'submit','class'=>'btn btn-danger btn-block col-md-6']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



@stop
