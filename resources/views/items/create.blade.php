@extends('layouts.app')

@section('content')
    <h1>Create Item</h1>
    {!! Form::open(['action'=>'itemsController@store','method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Product Name')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('brand_id','Brand ID')}}
                {{Form::text('brand_id','',['class'=>'form-control','placeholder'=>'*Brand ID'])}}
            </div>
            <div class="form-group">
                    {{Form::label('barcode','Barcode')}}
                    {{Form::text('barcode','',['class'=>'form-control','placeholder'=>'*Barcode'])}}
                </div>
            <div class="form-group">
                    {{Form::label('type_id','Product Type')}}
                    {{Form::text('type_id','',['class'=>'form-control','placeholder'=>'Type ID'])}}
                </div>
        <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}
            </div>
            <div class="form-group">
                {{Form::label('company','Company')}}
                {{Form::text('compnay','',['class'=>'form-control','placeholder'=>'Company'])}}
            </div>
            <div class="form-group">
                {{Form::label('units','Unit of Measure')}}
                {{Form::text('units','',['class'=>'form-control','placeholder'=>'Units'])}}
            </div>
            <div class="form-group">
                {{Form::label('quantity','Available Quantity')}}
                {{Form::text('quantity','',['class'=>'form-control','placeholder'=>'Quantity'])}}
            </div>
            <div class="form-group">
                {{form::file('cover_image')}}
            </div>
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}<br>
    <a href="/items/" class="btn btn-block btn-secondary">Cancel</a>
@endsection