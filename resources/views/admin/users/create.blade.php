@extends('layouts.admin')



@section('content')

    <div class="container mt-4">
        <div class="row justify-content-around">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Add User</h1>
                    </div>
                    <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

                    @csrf <!-- {{ csrf_field() }} -->

                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::email('email', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('role_id', 'Role:') !!}
                            {!! Form::select('role_id',[''=>'Select Role'] + $roles, null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('photo_id', 'Photo:') !!}
                            {!! Form::file('photo_id', ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password:') !!}
                            {!! Form::password('password', ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('confirmed_password', 'Confirm password:') !!}
                            {!! Form::password('confirmed_password', ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('admin.includes.form_error')
            </div>
        </div>
    </div>







@stop