@extends('layouts.layout')

@section('title')

    <title>Rabona.dk | Få de seneste nyheder!</title>

@stop


@section('content')
    <section id="all_news">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h1>Alle Rygter</h1>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">

                                @foreach($posts as $post)
                                    @if($post->post_type === 1)
                                        <a href="{{route('article', $post->slug)}}">
                                            <li class="media mb-2 bg-grey">
                                                <img width="97" height="90" class="mr-3" src="{{$post->photo->path}}" alt="">
                                                <div class="media-body">
                                                    <h5>{{$post->title}}</h5>
                                        </a>
                                        {{--                                <p>Hvad mon der sker nu?</p>--}}
                                        <small class="text-muted mr-auto"><i
                                                    class="far fa-clock"></i> {{$post->created_at->diffForHumans()}}
                                        </small>
                        </div>
                        </li>
                        @endif
                        @endforeach
                        </ul>
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-5">

                                {{$posts->render()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-black text-white text-center d-none d-lg-block">
                    <h1>Sponsor</h1>
                </div>
                <img src="/img/ADD.PNG" class="mb-3" alt="">
            </div>
        </div>
    </section>


@stop