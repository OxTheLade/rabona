@extends('layouts.admin')





@section('content')




    <!-- HEADER -->
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-pencil-alt"></i> Posts</h1>
                </div>
            </div>
        </div>
    </header>
    @if(Session::has('created_post'))

        <p class="alert alert-success">{{session('created_post')}}</p>

    @elseif(Session::has('updated_post'))

        <p class="alert alert-info">{{session('updated_post')}}</p>

    @elseif(Session::has('deleted_post'))

        <p class="alert alert-danger">{{session('deleted_post')}}</p>

    @endif

    <!-- SEARCH -->
    <section id="search" class="py-4 mb-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto">
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@search', 'class' => 'ml-auto text-white']) !!}
                    @csrf <!-- {{ csrf_field() }} -->
                    <div class="input-group">
                        {!! Form::text('search', null, ['class'=>'form-control', 'placeholder' => 'Search posts...']) !!}
                        <div class="input-group-append">
                            {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- POSTS -->
    <section id="post">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('posts.edit', $post->slug)}}" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i>Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-5">

                                {{$posts->render()}}

                            </div>
                        </div>











@stop