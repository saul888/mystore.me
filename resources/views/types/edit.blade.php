@extends('layouts.app')

@section('content')
    <h1>Edit Type</h1>
    {!! Form::open(['action' => ['TypesController@update', $type->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$type->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('description','description')}}
                {{Form::textarea('description',$type->description,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}
            </div>
            <div class="form-group">
                    {{Form::label('group_id','Group ID')}}
                    {{Form::text('group_id',$type->group_id,['class'=>'form-control','placeholder'=>'Group ID'])}}
                </div>
                <div class="form-group">
                        {{Form::label('vendor_id','Vendor ID')}}
                        {{Form::text('vendor_id',$type->vendor_id,['class'=>'form-control','placeholder'=>'Vendor ID'])}}
                    </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}<br>
                <a href="/types/{{$type->id}}" class="btn btn-block btn-secondary">Cancel</a>
@endsection