@extends('layouts.app')

@section('content')
    <h1>Edit Item</h1>
    {!! Form::open(['action' => ['itemsController@update', $item->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$item->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('brand_id','Brand ID')}}
            {{Form::text('brand_id',$item->brand_id,['class'=>'form-control','placeholder'=>'Brand ID'])}}
        </div>
        <div class="form-group">
            {{Form::label('barcode','Barcode')}}
            {{Form::text('barcode',$item->barcode,['class'=>'form-control','placeholder'=>'Barcode'])}}
        </div>
        <div class="form-group">
            {{Form::label('units','Unit of Measure')}}
            {{Form::text('units', $item->units,['class'=>'form-control','placeholder'=>'Units'])}}
        </div>
        <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description',$item->description,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body Text'])}}
            </div>
            <script>
                CKEDITOR.replace('article-ckeditor');
            </script>
            <div class="form-group">
                {{Form::label('company','Company')}}
                {{Form::text('company',$item->company,['class'=>'form-control','placeholder'=>'Company'])}}
            </div>
            <div class="form-group">
                {{Form::label('type_id','Product Type')}}
                {{Form::text('type_id',$item->type_id,['class'=>'form-control','placeholder'=>'Type ID'])}}
            </div>
            <div class="form-group">
                {{Form::label('quantitiy','Quantitiy')}}
                {{Form::text('quantitiy',$item->quantitiy,['class'=>'form-control','placeholder'=>'Quantitiy'])}}
            </div>
            <div class="form-group">
                    {{form::file('cover_image')}}
                </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!} <br>
    <a href="/items" class="btn btn-block btn-secondary">Cancel</a>
@endsection