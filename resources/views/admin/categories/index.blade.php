@extends('layouts.admin')






@section('content')
    <!-- HEADER -->
    <header id="main-header" class="py-2 bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-folder"></i> Categories</h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Create Category</h1>
                    </div>
                    <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

                    @csrf <!-- {{ csrf_field() }} -->

                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-8 align-self-center">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Categories</h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-secondary">
                                    <i class="fas fa-angle-double-right"></i>Details
                                </a>
                            </td>
                            <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
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
                    {{$categories->render()}}
                </div>
            </div>
        </div>
    </div>









@stop