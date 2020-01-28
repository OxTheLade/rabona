@extends('layouts.layout')

@section('title')

    <title>Rabona.dk | Få de seneste nyheder!</title>

@stop

@section('content')

    <section id="main-header">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="bg-black text-white text-center">
                        <h1>De Seneste Nyheder</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <?php $count = 0; ?>
                            @foreach($posts as $post)
                                @if($post->is_important === 1 & $post->post_type === 0)
                                    <?php if ($count == 4) break; ?>


                                    <div class="card">
                                        <a href="{{route('article', $post->slug)}}">
                                            <img width="250" height="190" src="{{$post->photo->path}}" alt=""
                                                 class="card-img-top">
                                            <div class="card-body">
                                                <h4 class="card-title">{{$post->title}}</h4>
                                        </a>

                                        <small class="text-muted"><i class="far fa-clock"></i>
                                            For {{$post->created_at->diffForHumans()}}</small>
                                        <p class="card-text">{{$post->preview}}</p>
                                    </div>
                        </div>

                    </div>
                    <div class="col-md-6 mb-3">
                        <?php $count++; ?>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-black text-white text-center d-none d-lg-block">
                    <h1>Annonce</h1>
                </div>
                <img src="/img/ADD.PNG" class="mb-3" alt="">
                <br>
                @foreach($leagues as $league)
                    <div class="card  d-none d-lg-block" style="width: 18rem;">
                        <div class="card-header text-dark text-center">
                            {{$league->name}}
                        </div>
                        <table class="card-table table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hold</th>
                                <th scope="col">K</th>
                                <th scope="col">P</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $number = 1; ?>
                            @foreach($league->teams->sortByDesc('points') as $team)
                                <tr class="{{$number <= 4 ? 'bg-dark-blue' : ''}} {{$number == 5 ? 'bg-dark-red' : ''}}">
                                    <td>{{$number}}</td>
                                    <?php $number++; ?>
                                    <td><img height="25" width="25"
                                             src="{{$team->photo->path}}"
                                             alt="">
                                        {{$team->name}}

                                    </td>
                                    <td>22</td>
                                    <td>{{$team->points}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
        </div>


    </section>

    <section id="latest_rumors">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-4">

                </div>
            </div>
    </section>

    <section id="latest_rumors_header">
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-8">
                    <div class="bg-black text-white text-center">
                        <h1>De Seneste Transfer Rygter</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <?php $count = 0; ?>
                            @foreach($posts as $post)
                                @if($post->is_important === 1 & $post->post_type === 1)
                                    <?php if ($count == 4) break; ?>
                                    <div class="card mb-3">
                                        <div class="card-img-caption">
                                            <a href="{{route('article', $post->slug)}}">
                                                <h4 class="card-text bg-black-opacity text-white">{{$post->title}}</h4>
                                                <img width="250" height="180" class="card-img-top"
                                                     src="{{$post->photo->path}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                        </div>
                        <div class="col-md-6">
                            <?php $count++; ?>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>




@stop


