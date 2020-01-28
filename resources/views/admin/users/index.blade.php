@extends('layouts.admin')




@section('content')


    <!-- HEADER -->
    <header id="main-header" class="py-2 bg-warning text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-users"></i> Users</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- USERS -->
    <section id="users">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Users</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Photo</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->name}}</td>
                                <td><img height="70" width="80" class="" src="{{$user->photo ? $user->photo->path : asset('images/avatar.png')}}" alt=""></td>
                                <td>
                                    <a href='{{route('users.edit', $user->id)}}' class='btn btn-secondary'>
                                        <i class='fas fa-angle-double-right'></i>Details
                                    </a>
                                </td>
                                <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
                                @csrf <!-- {{ csrf_field() }} -->
                                    <div class="form-group">
                                        {!! Form::button('<i class="fas fa-trash"></i> Delete', ['type'=>'submit','class'=>'btn btn-danger']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                            {{$users->render()}}
                    </div>
                </div>
            </div>
        </div>
    </section>











@stop