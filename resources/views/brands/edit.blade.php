@extends('layouts.app')

@section('content')
    <h1>Edit Brand</h1>
    {!! Form::open(['action' => ['BrandsController@update', $brand->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$brand->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('group_id','Group ID')}}
                {{Form::text('group_id',$brand->group_id,['class'=>'form-control','placeholder'=>'Group ID'])}}
            </div>
        <div class="form-group">
                {{Form::label('manufacturer','Manufacturer')}}
                {{Form::textarea('manufacturer',$brand->manufacturer,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}
            </div>
            <div class="form-group">
                {{Form::label('vendor_id','Vendor ID')}}
                {{Form::text('vendor_id',$brand->vendor_id,['class'=>'form-control','placeholder'=>'*Vendor ID'])}}
            </div>
            <div class="form-group">
                    {{Form::label('code','Brand Code')}}
                    {{Form::text('code',$brand->code,['class'=>'form-control','placeholder'=>'*Brand Code'])}}
                </div>
                <div class="form-group">
                        {{Form::label('location','Location')}}
                        {{Form::text('location',$brand->location,['class'=>'form-control','placeholder'=>'*Brand Code'])}}
                    </div>
                <div class="form-group">
                        {{Form::label('type','Type')}}
                        {{Form::text('type',$brand->type,['class'=>'form-control','placeholder'=>'Type'])}}
                    </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!} <br>
                <a href="/Brands/{{$brand->id}}" class="btn btn-block btn-secondary">Cancel</a>
@endsection