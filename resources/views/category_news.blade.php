@extends('layouts.layout')




@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h1>{{$category->name}}</h1>
                    <h3 class="text-muted">Få de seneste {{$category->name}} nyheder her</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @foreach($category->posts as $post)
                            <div class="card">
                                <a class="deco-none" href="{{route('article', $post->slug)}}">
                                <img height="" class="card-img-top img-responsive w-100" src="{{$post->photo->path}}" alt="">
                                <div class="card-body bg-light-grey">
                                    <h1>{{$post->title}}</h1>
                                </div>
                                </a>
                                <div class="card-footer">
                                    <small class="text-muted"><i class="far fa-clock"></i>
                                        {{$post->created_at->diffForHumans()}}
                                    </small>
                                </div>
                            </div>
                                <hr>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@stop