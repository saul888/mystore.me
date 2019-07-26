@extends('layouts.app')

@section('content')
    <h1>Create Shop</h1>
    {!! Form::open(['action'=>'ShopsController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('location','Location')}}
                {{Form::text('location','',['class'=>'form-control','placeholder'=>'*Location'])}}
            </div>
            <div class="form-group">
                    {{Form::label('type','Type')}}
                    {{Form::text('type','',['class'=>'form-control','placeholder'=>'*Type'])}}
                </div>
                <div class="form-group">
                        {{Form::label('description','Description')}}
                        {{Form::text('description','',['class'=>'form-control','placeholder'=>'*Description'])}}
                    </div>
                    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}<br>
            <a href="/shops/" class="btn btn-sm btn-block btn-secondary">Cancel</a>
@endsection