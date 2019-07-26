@extends('layouts.app')

@section('content')
    <h1>Edit Cashier</h1>
    {!! Form::open(['action' => ['CashiersController@update', $cashier->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name',$cashier->name,['class'=>'form-control','placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('shop_name','Shop Name')}}
                {{Form::text('shop_name',$cashier->shop_name,['class'=>'form-control','placeholder'=>'Shop title'])}}
            </div>
        <div class="form-group">
                {{Form::label('idnumber','ID number')}}
                {{Form::textarea('idnumber',$cashier->idnumber,['class'=>'form-control','placeholder'=>'Description'])}}
            </div>
            <div class="form-group">
                    {{form::file('cover_image')}}
                </div>
            <div class="form-group">
                {{Form::label('phone','Phone')}}
                {{Form::text('phone',$cashier->phone,['class'=>'form-control','placeholder'=>'*Phone'])}}
            </div>
            <div class="form-group">
                    {{Form::label('email','Email')}}
                    {{Form::text('email',$cashier->email,['class'=>'form-control','placeholder'=>'*Email'])}}
                </div>
                <div class="form-group">
                        {{Form::label('address','Address')}}
                        {{Form::text('address',$cashier->address,['class'=>'form-control','placeholder'=>'*Address'])}}
                    </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!} <br>
                <a href="/cashiers/{{$cashier->id}}" class="btn btn-sm btn-block btn-secondary">Cancel</a>
@endsection