@extends('layouts.app')

@section('content')
    <h1 style="font-family:Bradley Hand ITC; font-size: 44px;">&nbsp;Create&nbsp;Sale</h1>
    <hr>
    {!! Form::open(['action'=>'SalesController@store','method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('staff_name','Staff Name')}}
            {{Form::text('staff_name','',['class'=>'form-control','placeholder'=>'Staff Name'])}}
        </div>
        <div class="form-group" required>
                {{Form::label('shop_id','Shop ID')}}
                {{Form::text('shop_id','',['class'=>'form-control','placeholder'=>'*Shop ID'])}}
            </div>
            <div class="form-group">
                    {{Form::label('item_title','Item Name')}}
                    {{Form::text('item_title','',['class'=>'form-control','placeholder'=>'*Item Name'])}}
                </div>
                <div class="form-group">
                        {{Form::label('quantity','Quantity')}}
                        {{Form::text('quantity','',['class'=>'form-control','placeholder'=>'*Quantity'])}}
                    </div>
                <div class="form-group">
                        {{Form::label('cashsale','Cash Sale')}}
                        {{Form::text('cashsale','',['class'=>'form-control','placeholder'=>'Cahs Sale'])}}
                    </div>
                    <div class="form-group">
                        {{form::file('cover_image')}}
                    </div>
                    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}<br>
            <a href="/sales/" class="btn btn-sm btn-block btn-secondary">Cancel</a>
@endsection