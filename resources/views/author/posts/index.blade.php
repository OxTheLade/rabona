@extends('layouts.author')



@section('content')

    @if(Session::has('created_post'))

        <p class="alert alert-success">{{session('created_post')}}</p>

    @elseif(Session::has('updated_post'))

        <p class="alert alert-info">{{session('updated_post')}}</p>

    @elseif(Session::has('deleted_post'))

        <p class="alert alert-danger">{{session('deleted_post')}}</p>

    @endif

    {{--    <!-- SEARCH -->--}}
    {{--    <section id="search" class="py-4 mb-4 bg-light">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-6 ml-auto">--}}
    {{--                    <div class="input-group">--}}
    {{--                        <input type="text" class="form-control" placeholder="Search Posts...">--}}
    {{--                        <div class="input-group-append">--}}
    {{--                            <button class="btn btn-primary">Search</button>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    <!-- POSTS -->
    <section id="post">
        <div class="container mb-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->post_type == 0 ? 'Football News' : 'Football Rumour'}}</td>
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('author.posts.edit', $post->id)}}" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i>Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">

                {{$posts->render()}}

            </div>
        </div>
        </div>

@stop