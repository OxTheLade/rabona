@extends('layouts.admin')





@section('content')
    <!-- HEADER -->
    <header id="main-header" class="py-2 bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-folder"></i>Edit Category</h1>
                </div>
            </div>
        </div>
    </header>

<div class="container">
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Category</h1>
                </div>
                <div class="card-body">
                {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

                @csrf <!-- {{ csrf_field() }} -->

                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        {!! Form::submit('Update Category', ['class'=>'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>









@stop