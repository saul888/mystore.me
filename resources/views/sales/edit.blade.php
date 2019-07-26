@extends('layouts.app')

@section('content')<br>
    <h1 style="font-family:Bradley Hand ITC; font-size: 48px;">Edit Sale</h1>
    <hr>
    {!! Form::open(['action'=>['SalesController@update', $sale->id],'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('staff_name','Staff Name')}}
            {{Form::text('staff_name', $sale->staff_name,['class'=>'form-control','placeholder'=>'Staff Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('shop_id','Shop ID')}}
                {{Form::text('shop_id', $sale->shop_id,['class'=>'form-control','placeholder'=>'*Shop ID'])}}
            </div>
            <div class="form-group">
                    {{Form::label('item_title','Item ID')}}
                    {{Form::text('item_title', $sale->item_title,['class'=>'form-control','placeholder'=>'*Item ID'])}}
                </div>
                <div class="form-group">
                        {{Form::label('quantity','Quantity')}}
                        {{Form::text('quantity', $sale->quantity,['class'=>'form-control','placeholder'=>'*Quantity'])}}
                    </div>
                <div class="form-group">
                        {{Form::label('cashsale','Cash Sale')}}
                        {{Form::textarea('cashsale', $sale->cashsale,['class'=>'form-control','placeholder'=>'Cash Sale'])}}
                    </div>
                    <div class="form-group">
                            {{form::file('cover_image')}}
                        </div>
                                {{Form::hidden('_method','PUT')}}
                    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}<br>
            <a href="/sales/" class="btn btn-sm btn-block btn-secondary">Cancel</a>
@endsection