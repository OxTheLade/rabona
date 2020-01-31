@extends('layouts.layout')

@section('title')

    <title>Rabona.dk | Få de seneste nyheder!</title>

@stop

@section('content')



    <section id="main-header">
{{--        <img class="float-right" src="{{asset('img/ADD.PNG')}}" alt="">--}}
{{--        <img class="float-left" src="{{asset('img/ADD.PNG')}}" alt="">--}}


        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            @foreach($importantPosts as $key => $importantPost)
                                @if($key == 0)
                                    <div class="card">
                                        <a class="deco-none" href="#">
                                            <img width="250" height="210" src="{{$importantPost->photo->path}}" alt=""
                                                 class="card-img-top img-max-width">
                                            <div class="card-body">
                                                <h4 class="card-title">{{$importantPost->title}}</h4>
                                        </a>

                                        <p class="card-text">{{$importantPost->preview}}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted"><i class="far fa-clock"></i>
                                            {{$importantPost->created_at->diffForHumans()}} | <a
                                                    href="{{route('category', $importantPost->category->id)}}">{{$importantPost->category->name}}</a>
                                        </small>
                                    </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        @foreach($importantPosts as $key => $importantPost)
                            @if($key == 1 || $key == 2 || $key == 3)
                                <div class="card">
                                    <a class="deco-none" href="{{route('article', $importantPost->slug)}}">
                                        <img width="250" height="190" src="{{$importantPost->photo->path}}" alt=""
                                             class="card-img-top">
                                        <div class="card-body">
                                            <h4 class="card-title">{{$importantPost->title}}</h4>
                                    </a>

                                    <small class="text-muted"><i class="far fa-clock"></i>
                                        {{$importantPost->created_at->diffForHumans()}}
                                    </small>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Corporis
                                        deleniti fuga hic ipsam libero placeat ratione rem reprehenderit ut
                                        voluptas.</p>
                                </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    @endif
                    @endforeach
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-black text-white">
                <a id="seneste_nyt" href="{{route('all_news')}}">
                    <h1 class="text-center">Seneste nyt</h1>
                </a>
            </div>
            <div class="card">
                @foreach($posts as $key => $post)
                    @if($key == 5 || $key == 6 || $key == 7 || $key == 8 || $key == 9 || $key == 10 || $key == 11 || $key == 12)
                        <div class="card">
                            <a class="deco-none" href="{{route('article', $post->slug)}}">
                                <div class="card-body bg-light-grey">
                                    <p>{{$post->title}}</p>
                                </div>
                            </a>
                            <div class="card-footer">
                                <small class="text-muted"><i class="far fa-clock"></i>
                                    {{$post->created_at->diffForHumans()}}
                                </small>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="text-center">
                    <div class="card-footer">
                        <a href="{{route('all_news')}}" class="btn btn-secondary btn-block">Flere af de seneste</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <hr>


@stop


