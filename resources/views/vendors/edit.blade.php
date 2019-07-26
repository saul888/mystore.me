@extends('layouts.app')

@section('content')
    <h1>Edit Vendor</h1>
    {!! Form::open(['action'=>['VendorsController@update', $vendor->id],'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Vendor Name')}}
            {{Form::text('name', $vendor->name,['class'=>'form-control','placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('group_id','Group ID')}}
                {{Form::text('group_id', $vendor->group_id,['class'=>'form-control','placeholder'=>'*Group ID'])}}
            </div>
            <div class="form-group">
                    {{Form::label('brand_id','Brand ID')}}
                    {{Form::text('brand_id', $vendor->brand_id,['class'=>'form-control','placeholder'=>'*Brand ID'])}}
                </div>
                <div class="form-group">
                        {{Form::label('idnumber','ID number')}}
                        {{Form::text('idnumber', $vendor->idnumber,['class'=>'form-control','placeholder'=>'*ID number'])}}
                    </div>
                <div class="form-group">
                        {{Form::label('description','Description')}}
                        {{Form::textarea('description', $vendor->description,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}
                    </div>
                    <div class="form-group">
                            {{Form::label('phone','Phone Number')}}
                            {{Form::text('phone', $vendor->phone,['class'=>'form-control','placeholder'=>'Phone number'])}}
                        </div>
                        <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::text('email', $vendor->email,['class'=>'form-control','placeholder'=>'Email'])}}
                            </div>
                            <div class="form-group">
                                    {{Form::label('address','Address')}}
                                    {{Form::text('address', $vendor->address,['class'=>'form-control','placeholder'=>'Address'])}}
                                </div>
                                {{Form::hidden('_method','PUT')}}
                    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
            <a href="/Vendors/" class="btn btn-block btn-secondary">Cancel</a>
@endsection