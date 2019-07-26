@extends('layouts.app')

@section('content')
<a href="/cashiers" class="btn btn-sm btn-block btn-secondary">Go Back</a><br><br>
<div class="row">
                <div class="col-md-2 col-sm-2">
                <img style="width:100%" class="img-thumbnail" src="/storage/cover_images/{{$cashier->cover_image}}">
                </div>
                <div class="col-md-8 col-sm-8">
                <h1>{{$cashier->name}}</h1>
                <div>
                        <p><mark class="font-weight-bold">Shop ID:</mark> {{$cashier->shop_name}}</p>
                        </div>
                                <div>
                                        <p><mark class="font-weight-bold">ID number:</mark>{{$cashier->idnumber}}</p>
                                </div>
                                        <div>
                                                <p><mark class="font-weight-bold">Phone:</mark>{{$cashier->phone}}</p>
                                        </div>
                                        <div>
                                                <p><mark class="font-weight-bold">Email:</mark> {{$cashier->email}}</p>
                                        </div>
                                                <div>
                                                        <p><mark class="font-weight-bold">Address:</mark>{!!$cashier->address!!}</p>
                                                        </div>
                        <hr>
                        <small>written on {{$cashier->created_at}}</small>
                        <hr>
                </div>
        </div><br>
                        <a href="/cashiers/{{$cashier->id}}/edit" class="btn btn-sm btn-block btn-warning">Edit Cashier</a><br>

                        {!!Form::open(['action'=>['CashiersController@destroy', $cashier->id], 'method' => 'POST','class' => 'text-left']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close() !!}<br>
@endsection