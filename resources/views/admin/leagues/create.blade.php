@extends('layouts.admin')




@section('content')

    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header mb-2">
                        <h1>Create League</h1>
                    </div>
                    <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminLeaguesController@store']) !!}

                    @csrf <!-- {{ csrf_field() }} -->

                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('country_id', 'Country:') !!}
                            {!! Form::select('country_id', [''=>'Choose Country'] +  $countries, null, ['class'=>'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::submit('Create League', ['class'=>'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">


                @include('admin.includes.form_error')


            </div>
        </div>
    </div>





@stop