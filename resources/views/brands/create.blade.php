@extends('layouts.app')

@section('content')
    <h1>Create Brand</h1>
    {!! Form::open(['action'=>'BrandsController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Brand Name')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('group_id','Group ID')}}
                {{Form::text('group_id','',['class'=>'form-control','placeholder'=>'*Group ID'])}}
            </div>
        <div class="form-group">
                {{Form::label('manufacturer','Manufacturer')}}
                {{Form::textarea('manufacturer','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Manufacturer'])}}
            </div>
            <div class="form-group">
                    {{Form::label('location','Location')}}
                    {{Form::text('location','',['class'=>'form-control','placeholder'=>'Location'])}}
                </div>
            <div class="form-group">
                {{Form::label('vendor_id','Vendor ID')}}
                {{Form::text('vendor_id','',['class'=>'form-control','placeholder'=>'*Vendor ID'])}}
            </div>
            <div class="form-group">
                    {{Form::label('code','Brand Code')}}
                    {{Form::text('code','',['class'=>'form-control','placeholder'=>'*code'])}}
                </div>
                <div class="form-group">
                        {{Form::label('type','Brand Type')}}
                        {{Form::text('type','',['class'=>'form-control','placeholder'=>'Type'])}}
                    </div>
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}<br>
    <a href="/Brands" class="btn btn-block btn-secondary">Cancel</a>
@endsection