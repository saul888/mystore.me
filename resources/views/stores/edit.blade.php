@extends('layouts.app')

@section('content')
    <h1>Create Store</h1>
    {!! Form::open(['action' => ['StoreController@update', $stores->id],'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Name')}}
            {{Form::text('title', $stores->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('type','Type')}}
            {{Form::text('type', $stores->type,['class'=>'form-control','placeholder'=>'*Type'])}}
        </div>
        <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description', $stores->description ,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}
            </div>
            <div class="form-group">
                    {{Form::label('location','Location')}}
                    {{Form::text('location', $stores->location,['class'=>'form-control','placeholder'=>'location'])}}
                </div>
                <div class="form-group">
                        {{Form::label('type','Type')}}
                        {{Form::text('type', $stores->type,['class'=>'form-control','placeholder'=>'Type'])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}<br>
    <a href="/store/{{$stores->id}}" class="btn btn-block btn-secondary">Cancel</a>
@endsection