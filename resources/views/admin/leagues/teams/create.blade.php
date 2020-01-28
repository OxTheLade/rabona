@extends('layouts.admin')



@section('content')

    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header mb-2">
                        <h1>Add Team</h1>
                    </div>
                    <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminTeamsController@store', 'files'=>true]) !!}

                    @csrf <!-- {{ csrf_field() }} -->

                        <div class="form-group">
                            {!! Form::label('name', 'Team Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('league_id', 'League:') !!}
                            {!! Form::select('league_id', [''=>'Choose League'] +  $leagues, null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('photo_id', 'Photo:') !!}
                            {!! Form::file('photo_id', ['class'=>'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::submit('Add Team', ['class'=>'btn btn-primary']) !!}
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