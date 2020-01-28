@extends('layouts.admin')





@section('content')

    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-user"></i> Edit Profile</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- ACTIONS -->
    <section id="actions" class="py-4 mb-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('admin.index')}}" class="btn btn-light btn-block">
                        <i class="fas fa-arrow-left"></i> Back To Dashboard
                    </a>
                </div>
                <div class="col-md-3">
                    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminProfileController@update', $user->id], 'files'=>true]) !!}
                    <div class="form-group">
                    @csrf <!-- {{ csrf_field() }} -->

                        {!! Form::button('<i class="fas fa-lock"></i> Save Changes', ['type'=>'submit' ,'class'=>'btn btn-success btn-block text-white', ]) !!}
                    </div>

                </div>
                <div class="col-md-3">
                    <a href="{{route('profile.password')}}" class="btn btn-warning btn-block">
                        <i class="fas fa-key"></i> Change Password
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- PROFILE -->
    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">


                            <div class="form-group">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h3>Your Avatar</h3>
                    <img height="70" width="100" src="{{$user->photo ? $user->photo->path : asset('img/avatar.png')}}"
                         alt="{{asset('img/avatar.png')}}"
                         class="d-block img-fluid  mb-3">
                    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminProfileController@update', $user->id], 'files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::file('photo_id', ['class'=>'form-control']) !!}
                    </div>
                    {!! Form::submit('Save Photo', ['class'=>'btn btn-success btn-block text-white mb-2', 'name'=>'submitbutton', 'value'=>'savephoto']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>






@stop