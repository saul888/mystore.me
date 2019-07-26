@extends('layouts.app')

@section('content')
    <h1>Create Vendor</h1>
    {!! Form::open(['action'=>'VendorsController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Vendor Name')}}
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('group_id','Group ID')}}
                {{Form::text('group_id','',['class'=>'form-control','placeholder'=>'*Group ID'])}}
            </div>
            <div class="form-group">
                    {{Form::label('brand_id','Brand ID')}}
                    {{Form::text('brand_id','',['class'=>'form-control','placeholder'=>'*Brand ID'])}}
                </div>
                <div class="form-group">
                        {{Form::label('idnumber','ID number')}}
                        {{Form::text('idnumber','',['class'=>'form-control','placeholder'=>'*ID number'])}}
                    </div>
                <div class="form-group">
                        {{Form::label('description','Description')}}
                        {{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}
                    </div>
                    <div class="form-group">
                            {{Form::label('phone','Phone Number')}}
                            {{Form::text('phone','',['class'=>'form-control','placeholder'=>'Phone number'])}}
                        </div>
                        <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::text('email','',['class'=>'form-control','placeholder'=>'Email'])}}
                            </div>
                            <div class="form-group">
                                    {{Form::label('address','Address')}}
                                    {{Form::text('address','',['class'=>'form-control','placeholder'=>'Address'])}}
                                </div>
                    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}<br>
            <a href="/Vendors/" class="btn btn-block btn-secondary">Cancel</a>
@endsection