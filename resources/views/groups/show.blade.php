@extends('layouts.app')

@section('content')
<a href="/products" class="btn btn-sm btn-block btn-secondary">Go Back</a><br><br>
<h1>{{$groups->title}}</h1>
<div>
    <p><mark class="font-weight-bold">Store ID:</mark>{{$groups->store_id}}</p>
</div>
        <div>
            <p><mark class="font-weight-bold">Status:</mark>{{$groups->status}}</p>
            </div>
            <div>
                <p><mark class="font-weight-bold">Description:</mark>{!!$groups->description!!}</p>
             </div>
            <div>
                <p><mark class="font-weight-bold">Storage:</mark>{{$groups->storage}}</p>
                </div>
                
<hr>
<small>Written on {{$groups->created_at}}</small>
<hr>

    @if(!Auth::guest())
    <a href="/products/{{$groups->id}}/edit" class="btn btn-sm btn-block btn-warning">Edit Group</a><br>

        {!!Form::open(['action'=>['ProductsController@destroy', $groups->id], 'method' => 'POST','class' => 'text-left']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}<br>
        @endif
        <h2>*associated types:</h2>
        <div class="card shadow">
            <div class="card-body">
            <table id="table_id" class="display">
                    <thead>
                        <tr style="background-color:lightgrey">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Group</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($types) > 0)
                    @foreach($types as $type)
                        <tr>
                            <td>{{$type->id}}</td>
                            <td><a href="/types/{{$type->id}}">{{$type->title}}</a></td>
                            <td>{{$type->description}}</td>
                            <th>{{$type->group_id}}</th>
                            <th>{{$type->created_at}}</th>
                            <td>{{$type->updated_at}}</td>
                        </tr>
                        @endforeach
                        @else
                        <p>No products found</p>
                        @endif
                    </tbody>
                </table>
                <a id="btn" href="/types/create">+ add new custom Type!</a>
                <hr>
            </div>
            </div>

@endsection