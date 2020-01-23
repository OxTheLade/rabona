@extends('layouts.admin')





@section('content')


    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Body</th>
                <th>View Post</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>

            @if($posts)


                @foreach($posts as $post)

                    <tr>
                        <td>{{$post->id}}</td>
                        <td><a href="{{route('posts.edit', $post->slug)}}">{{$post->title}}</a></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                        <td><img height="50"
                                 src="{{$post->photo ? $post->photo->file : '/images/facebook-default-no-profile-pic-300x300.jpg'}}"
                                 alt=""></td>
                        <td>{!! Str::limit($post->body, 30) !!}</td>
                        <td><a href="{{route('article', $post->slug)}}">View Post</a></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>

                @endforeach
            @endif

            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">

                {{$posts->render()}}

            </div>
        </div>
    </div>










@stop