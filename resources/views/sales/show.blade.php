@extends('layouts.app')

@section('content')
<a href="/sales" class="btn btn-sm btn-block btn-secondary">Go Back</a><br><br>

<div class="row">
        <div class="col-md-2 col-sm-2">
                        <img style="width:100%" class="img-thumbnail" src="/storage/cover_images/{{$sales->cover_image}}">
                </div>
                <div class="col-md-8 col-sm-8">
                <h1>{{$sales->item_title}}</h1>
                <div>
                        <p><mark class="font-weight-bold">Staff Name:</mark> {{$sales->staff_name}}</p>
                        </div>
                                        <div>
                                                <p><mark class="font-weight-bold">Description:</mark> {{$sales->quantity}}</p>
                                        </div>
                                        <div>
                                                        <p><mark class="font-weight-bold">Cash Sale:</mark> {{$sales->cashsale}}</p>
                                                </div>
                        <hr>
                        <small>written on {{$sales->created_at}}</small>
                        <hr>
                </div>
</div><br>
                        <a href="/sales/{{$sales->id}}/edit" class="btn btn-sm btn-block btn-warning">Edit Sale</a><br>

                        {!!Form::open(['action'=>['SalesController@destroy', $sales->id], 'method' => 'POST','class' => 'text-left']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close() !!}<br>
@endsection