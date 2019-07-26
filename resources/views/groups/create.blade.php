@extends('layouts.app')

@section('content')
    <h1>Create Group</h1>
    {!! Form::open(['action'=>'ProductsController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Group Name')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}
            </div>
            <div class="form-group">
                    {{Form::label('status','Group Status')}}
                    {{Form::text('status','',['class'=>'form-control','placeholder'=>'Status'])}}
                </div>
                <div class="form-group">
                        {{Form::label('storage','Storage method')}}
                        {{Form::text('storage','',['class'=>'form-control','placeholder'=>'Storage'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('store_id','Store ID')}}
                        {{Form::text('store_id','',['class'=>'form-control','placeholder'=>'Store ID'])}}
                    </div>
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}<br>
    <a href="/products/" class="btn btn-block btn-secondary">Cancel</a>
@endsection