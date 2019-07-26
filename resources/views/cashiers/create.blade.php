@extends('layouts.app')

@section('content')
    <h1>Create Cashier</h1>
    {!! Form::open(['action'=>'CashiersController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('shop_name','Shop Title')}}
                {{Form::text('shop_name','',['class'=>'form-control','placeholder'=>'*Shop Name'])}}
            </div>
        <div class="form-group">
                {{Form::label('idnumber','ID Number')}}
                {{Form::text('idnumber','',['class'=>'form-control','placeholder'=>'ID Number'])}}
            </div>
            <div class="form-group">
                    {{Form::label('phone','Phone')}}
                    {{Form::text('phone','',['class'=>'form-control','placeholder'=>'Location'])}}
                </div>
            <div class="form-group">
                {{Form::label('email','Email')}}
                {{Form::text('email','',['class'=>'form-control','placeholder'=>'*Email'])}}
            </div>
            <div class="form-group">
                    {{Form::label('address','Address')}}
                    {{Form::text('address','',['class'=>'form-control','placeholder'=>'*Address'])}}
                </div>
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}<br>
    <a href="/cashiers" class="btn btn-block btn-sm btn-secondary">Cancel</a>
@endsection