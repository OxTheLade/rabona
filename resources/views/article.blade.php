@extends('layouts.layout')




@section('content')

    <section id="main-article">
        <div class="container mt-4 mb-4">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h1>{{$post->title}}</h1>
                            <small class="text-muted"><i class="fas fa-pencil-alt"></i> {{$post->user->name}}</small>
                            <div class="mr-auto">
                                <small class="text-muted mr-auto"><i class="far fa-clock"></i> Posted {{$post->created_at->diffForHumans()}}
                                </small>
                            </div>
                        </div>
                        <div class="card-body">
                            <img width="400" height="370" src="{{asset('img/1491602_w1.jpg')}}" alt=""
                                 class="card-img-top img-fluid">
                            <hr>
                            <p class="card-text">
                                {!! $post->body !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-black text-white text-center">
                        <h1>SPONSOR</h1>
                    </div>
                    SPONSOR HER
                </div>
            </div>
        </div>
    </section>

    <section id="read_more">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="bg-black text-white text-center">
                        <h2>LÆS MERE OM INTER</h2>
                    </div>
                    <ul class="list-unstyled">
                        <a href="#">
                            <li class="media mb-2 bg-grey">

                                <img class="mr-3" src="https://source.unsplash.com/random/90x96">
                                <div class="media-body">
                                    <p class="lead">UEFA CUPPEN ER I HUS</p>
                                </div>

                            </li>
                        </a>
                        <a href="#">
                            <li class="media mb-2 bg-grey">
                                <img class="mr-3" src="https://source.unsplash.com/random/90x97">
                                <div class="media-body">
                                    <h5>INTER UDE AF EUROLEAGUE</h5>
                        </a>
                        <p>Hvad mon der sker nu?</p>
                        <small class="text-muted mr-auto"><i class="far fa-clock"></i> Posted 20 minutes ago
                        </small>
                </div>
                </li>

                <a href="#">
                    <li class="media mb-2 bg-grey">
                        <img class="mr-3" src="https://source.unsplash.com/random/90x98">
                        <div class="media-body">
                            <h5>List based media object</h5>
                        </div>
                    </li>
                </a>
                </ul>
            </div>
        </div>
        </div>
    </section>




@stop