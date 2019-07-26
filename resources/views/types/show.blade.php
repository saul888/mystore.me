@extends('layouts.app')

@section('content')<br>
<a href="/products" class="btn btn-sm btn-block btn-light" style="font-family:Brush Script MT; font-size: 50px;">Station Products</a>
<hr>
<a href="/types" class="btn btn-sm btn-block btn-warning">Go Back</a><br><br>
    <h1>{{$type->title}}</h1>
    <div>
        <p><mark class="font-weight-bold">Group ID:</mark> {{$type->group_id}}</p>
        </div>
    <div>
        <p><mark class="font-weight-bold">Description:</mark> {!!$type->description!!}</p>
    </div>
    <div>
            <p><mark class="font-weight-bold">Vendor ID:</mark> {{$type->vendor_id}}</p>
            </div>
    <hr>
    <small>written on {{$type->created_at}}</small>
    <hr>
    <a href="/types/{{$type->id}}/edit" class="btn btn-sm btn-block btn-success">Edit Type</a><br>

    {!!Form::open(['action'=>['TypesController@destroy', $type->id], 'method' => 'POST','class' => 'text-left']) !!}
       {{Form::hidden('_method', 'DELETE')}}
       {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}<br>
    <h2>*associated items:</h2>
    <div class="card shadow">
        <div class="card-body">
        <table id="table_id" class="display">
            <thead>
                <tr style="background-color:lightgrey">
                    <th>Id</th>
                    <th>Title</th>
                    <th>Brand</th>
                    <th>Barcode</th>
                    <th>Type</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
            @if(count($items) > 0)
            @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td><a href="/items/{{$item->id}}">{{$item->title}}</a></td>
                    <td>{{$item->brand_id}}</td>
                    <td>{{$item->barcode}}</td>
                    <th>{{$item->type_id}}</th>
                    <td>{{$item->created_at}}</td>
                </tr>
                @endforeach
                        @else
                        <p>No posts found</p>
                        @endif
                    </tbody>
                </table>
                <a href="/items/create">+ add a new item!</a>
                <hr>
                </div>
                </div>
@endsection