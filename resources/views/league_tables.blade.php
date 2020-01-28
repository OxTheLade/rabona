@extends('layouts.layout')

@section('title')

    <title>Rabona.dk | Få de seneste nyheder!</title>

@stop

@section('content')


    <div class="container mt-3">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6 mb-3">
                <!-- ACCORDION -->
                @foreach($leagues as $league)
                    <div id="accordion">
                        <div class="card" style="width: 25rem;">
                            <div class="card-header">
                                <h5>
                                    <a href="#{{str_replace(' ', '', $league->name)}}" data-parent="#accordion"
                                       data-toggle="collapse">
                                        {{$league->name}}
                                    </a>
                                </h5>
                            </div>
                            <div id="{{str_replace(' ', '', $league->name)}}" class="collapse">
                                <div class="card-body">

                                        <div class="panel panel-default">
                                            <table class="card-table table table-hover table-sm table-bordered"
                                                   style="width: 22rem; border-radius: 4px;">
                                                <thead class="thead-dark">
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
                                                        <th scope="row">{{$number}}</th>
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
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="col-md-6 mb-3">
                @endforeach
            </div>
        </div>
    </div>


@stop

@section('scripts')

    <script>
        $(document).ready(function () {
            $("[data-parent='#accordion']").on("click", function () {
                var trigger = $(this);
                $(".panel-collapse.collapse.in").each(function () {
                    if (trigger.attr("href") != ("#" + $(this).attr("id"))) {
                        $(this).removeClass("in");
                    } // condition returns false on iteration on div to be opened
                });
            });
        });
    </script>

@stop