@extends('layouts.admin')





@section('content')


    <div class="card">
        <div class="card-header"><b>{{ $searchResults->count() }} resultater fundet for "{{ request('search') }}"</b></div>

        <div class="card-body">

            @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                <h2>Resultater</h2>

                @foreach($modelSearchResults as $searchResult)
                    <ul>
                        <li><a href="{{ route('posts.edit', $searchResult->slug) }}">{{ $searchResult->title }}</a></li>
                    </ul>
                @endforeach
            @endforeach

        </div>
    </div>











@stop