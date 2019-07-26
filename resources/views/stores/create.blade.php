@extends('layouts.app')

@section('content')
    <h1>Create Store</h1>
    {!! Form::open(['action'=>'StoreController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Store Name')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('type','Type')}}
                {{Form::text('type','',['class'=>'form-control','placeholder'=>'*Type'])}}
            </div>
        <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}
            </div>
            <div class="form-group">
                    {{Form::label('location','Store location')}}
                    {{Form::text('location','',['class'=>'form-control','placeholder'=>'*location'])}}
                </div>
                <div class="form-group">
                        {{Form::label('type','Type')}}
                        {{Form::text('type','',['class'=>'form-control','placeholder'=>'Type'])}}
                    </div>
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}<br>
    <a href="/store/" class="btn btn-block btn-secondary">Cancel</a>
@endsection