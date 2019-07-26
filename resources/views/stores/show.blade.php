@extends('layouts.app')

@section('content')
<a href="/store" class="btn btn-secondary">Go Back</a><br><br>
    <h1>{{$stores->title}}</h1>
    <div>
        <p><mark class="font-weight-bold">Store type:</mark> {{$stores->type}}</p>
    </div>
    <div>
        <p><mark class="font-weight-bold">Location:</mark> {{$stores->location}}</p>
        </div>
        <div>
            <p><mark class="font-weight-bold">Description:</mark> {!!$stores->description!!}</p>
        </div>
    <hr>
    <small>written on {{$stores->created_at}}</small>
    <hr>
    <a href="/store/{{$stores->id}}/edit" class="btn btn-sm btn-block btn-warning">Edit Store</a><br>

    {!!Form::open(['action'=>['StoreController@destroy', $stores->id], 'method' => 'POST','class' => 'text-left']) !!}
       {{Form::hidden('_method', 'DELETE')}}
       {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}<br>
    <h1>*assosiated stock:</h1>
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
                        <p>No products found</p>
                        @endif
                    </tbody>
                </table>
                <a id="btn" href="/items/create">+ add new item!</a>
                <hr>
            </div>
            </div>
@endsection