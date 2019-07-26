@extends('layouts.app')

@section('content')
<a href="/products" class="btn btn-sm btn-block btn-light" style="font-family:Brush Script MT; font-size: 50px;">Station Items</a>
<hr>
<hr><br>
<div class="row">
    <div class="col-md-2 col-sm-2">
    <img style="width:100%" class="img-thumbnail" src="/storage/cover_images/{{$item->cover_image}}">
    </div>
    <div class="col-md-8 col-sm-8">
      <h1>{{$item->title}}</h1>
      <div>
        <p><mark class="font-weight-bold">Item ID:</mark> {{$item->id}}</p>
    </div>
    <div>
        <p><mark class="font-weight-bold">Barcode:</mark> {{$item->barcode}}</p>
    </div>
    <div>
        <p><mark class="font-weight-bold">Company:</mark>  {{$item->company}}</p>
    </div>
    <div>
        <p><mark class="font-weight-bold">Product Type:</mark> {{$item->type_id}}</p>
    </div>
    <div>
        <p><mark class="font-weight-bold">Units of Measure:</mark> {{$item->units}}</p>
    </div>
    <div>
        <p><mark class="font-weight-bold">Quantity Available:</mark> {{$item->quantity}}</p>
    </div>
    <div>
        <p><mark class="font-weight-bold">Description:</mark> {!!$item->description!!}</p>
    </div>
    <hr>
    <small>written on {{$item->created_at}}</small>
    <hr>
    </div>
</div><br>
    @if(!Auth::guest())
    <a href="/items" class="btn btn-sm btn-block btn-warning">Go Back</a>
    <a href="/items/{{$item->id}}/edit" class="btn btn-sm btn-block btn-success">Edit Item</a><br>
    {!!Form::open(['action'=>['itemsController@destroy', $item->id], 'method' => 'POST','class' => 'text-left']) !!}
       {{Form::hidden('_method', 'DELETE')}}
       {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}<br>
    @endif

    <h2>*associated brand:</h2>
    <div class="card shadow">
        <div class="card-body">
        <table id="table_id" class="display">
                <thead>
                    <tr style="background-color:lightgrey">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Manufacturer</th>
                        <th>Type</th>
                        <th>Code</th>
                        <th>Location</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($brands) > 0)
                @foreach($brands as $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td><a href="/Brands/{{$brand->id}}">{{$brand->title}}</a></td>
                        <td>{!!$brand->manufacturer!!}</td>
                        <td>{{$brand->type}}</td>
                        <td>{{$brand->code}}</td>
                        <th>{{$brand->location}}</th>
                        <td>{{$brand->created_at}}</td>
                    </tr>
                    @endforeach
                    @else
                    <p>No brands found</p>
                    @endif
                </tbody>
            </table>
            </div>
            </div><br>

@endsection