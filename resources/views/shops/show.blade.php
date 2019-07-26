@extends('layouts.app')

@section('content')
<a href="/shops" class="btn btn-sm btn-block btn-secondary">Go Back</a><br><br>
    <h1>{{$shop->title}}</h1>
    <div>
            <p><mark class="font-weight-bold">Location:</mark> {{$shop->location}}</p>
        </div>
                <div>
                        <p><mark class="font-weight-bold">Type:</mark>{{$shop->type}}</p>
                </div>
                        <div>
                                <p><mark class="font-weight-bold">Description:</mark> {{$shop->description}}</p>
                        </div>
        <hr>
        <small>written on {{$shop->created_at}}</small>
        <hr>
        <a href="/shops/{{$shop->id}}/edit" class="btn btn-sm btn-block btn-warning">Edit Sale</a><br>

        {!!Form::open(['action'=>['ShopsController@destroy', $shop->id], 'method' => 'POST','class' => 'text-left']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close() !!}<br>
@endsection