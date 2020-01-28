@extends('layouts.admin')


@section('content')
    <header id="main-header" class="py-2 bg-grey text-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-futbol"></i> Leagues</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- LEAGUES -->
    <section id="league">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Leagues</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leagues as $league)
                                <tr>
                                    <td>{{$league->id}}</td>
                                    <td>{{$league->name}}</td>
                                    <td>{{$league->country->name}}</td>
                                    <td>
                                        <a href="{{route('leagues.teams', $league->id)}}" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i>Details
                                        </a>
                                    </td>
                                    <td>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminLeaguesController@destroy', $league->id]]) !!}
                                    @csrf <!-- {{ csrf_field() }} -->
                                        <div class="form-group">
                                            {!! Form::button('<i class="fas fa-trash"></i> Delete League', ['type'=>'submit','class'=>'btn btn-danger']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-5">

                                {{$leagues->render()}}

                            </div>
                        </div>







@stop