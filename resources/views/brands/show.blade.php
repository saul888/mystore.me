@extends('layouts.app')

@section('content')
<a href="/Brands" class="btn btn-sm btn-block btn-secondary">Go Back</a><br><br>
    <h1>{{$brand->title}}</h1>
    <div>
            <p><mark class="font-weight-bold">Group ID:</mark> {{$brand->group_id}}</p>
        </div>
                <div>
                        <p><mark class="font-weight-bold">Vendor ID:</mark>{{$brand->vendor_id}}</p>
                </div>
                        <div>
                                <p><mark class="font-weight-bold">Company Code:</mark> {{$brand->code}}</p>
                        </div>
                         <div>
                                <p><mark class="font-weight-bold">Brand Type:</mark> {{$brand->type}}</p>
                        </div>
                                <div>
                                                <p><mark class="font-weight-bold">Manufacturer:</mark>{!!$brand->manufacturer!!}</p>
                                        </div>
        <hr>
        <small>written on {{$brand->created_at}}</small>
        <hr>
        <a href="/Brands/{{$brand->id}}/edit" class="btn btn-sm btn-block btn-warning">Edit Store</a><br>

        {!!Form::open(['action'=>['BrandsController@destroy', $brand->id], 'method' => 'POST','class' => 'text-left']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close() !!}<br>
@endsection