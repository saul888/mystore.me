@extends('layouts.app')

@section('content')
<a href="/shops/" class="btn btn-sm btn-block btn-secondary">Cancel</a><br>
    <h1 style="font-family:Bradley Hand ITC; font-size: 48px;">Edit Sale</h1>
    {!! Form::open(['action'=>['ShopsController@update', $shop->id],'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title', $shop->title,['class'=>'form-control','placeholder'=>'Staff Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('location','Location')}}
                {{Form::text('location', $shop->location,['class'=>'form-control','placeholder'=>'*Shop ID'])}}
            </div>
            <div class="form-group">
                    {{Form::label('type','Type')}}
                    {{Form::text('type', $shop->type,['class'=>'form-control','placeholder'=>'*Item ID'])}}
                </div>
                <div class="form-group">
                        {{Form::label('description','Description')}}
                        {{Form::text('description', $shop->description,['class'=>'form-control','placeholder'=>'Description'])}}
                    </div>
                                {{Form::hidden('_method','PUT')}}
                    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}<br>
@endsection