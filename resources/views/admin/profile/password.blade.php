@extends('layouts.admin')





@section('content')

    <header id="main-header" class="py-2 bg-warning text-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-lock"></i> Change Password</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-5">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Chose New Password</h4>
                    </div>
                    <div class="card-body">
                    {!! Form::open(['method'=>'PATCH', 'action'=>'AdminProfileController@changePassword']) !!}

                    @csrf <!-- {{ csrf_field() }} -->

                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                                {!! Form::password('current_password', ['class'=>'form-control', 'placeholder' => 'Enter current password', 'required']) !!}
                            </div>
                        </div>

                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                                {!! Form::password('new_password', ['class'=>'form-control', 'placeholder' => 'Enter new password', 'required']) !!}
                            </div>
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                                {!! Form::password('confirmed_password', ['class'=>'form-control', 'placeholder' => 'Confirm new password', 'required']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            {!! Form::submit('Change Password', ['class'=>'btn btn-success']) !!}
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