@extends('layouts.app')

@section('content')
    <h1>Create Type</h1>
    {!! Form::open(['action'=>'TypesController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Official Name')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}
            </div>
            <div class="form-group">
                    {{Form::label('group_id','Group ID')}}
                    {{Form::text('group_id','',['class'=>'form-control','placeholder'=>'Group ID'])}}
                </div>
                <div class="form-group">
                        {{Form::label('vendor_id','Vendor ID')}}
                        {{Form::text('vendor_id','',['class'=>'form-control','placeholder'=>'Vendor ID'])}}
                    </div>
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}<br>
    <a href="/types/" class="btn btn-block btn-secondary">Cancel</a>
@endsection