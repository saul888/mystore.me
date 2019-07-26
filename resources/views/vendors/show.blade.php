@extends('layouts.app')

@section('content')
<a href="/Vendors" class="btn btn-secondary">Go Back</a><br><br>
    <h1>{{$vendor->name}}</h1>
    <div>
            <p><mark class="font-weight-bold">Group ID:</mark> {{$vendor->group_id}}</p>
        </div>
    <div>
            <p><mark class="font-weight-bold">Brand ID:</mark>{{$vendor->brand_id}}</p>
    </div>
    <div>
            <p><mark class="font-weight-bold">ID number:</mark> {{$vendor->idnumber}}</p>
    </div>
    <div>
            <p><mark class="font-weight-bold">Description:</mark> {!!$vendor->description!!}</p>
        </div>
        <div>
            <p><mark class="font-weight-bold">Phone:</mark> {{$vendor->phone}}</p>
        </div>
        <div>
                <p><mark class="font-weight-bold">Email:</mark> {{$vendor->email}}</p>
        </div>
        <div>
                <p><mark class="font-weight-bold">Address:</mark> {{$vendor->address}}</p>
            </div>
        <hr>
        <small>written on {{$vendor->created_at}}</small>
        <hr>
        <a href="/Vendors/{{$vendor->id}}/edit" class="btn btn-sm btn-block btn-warning">Edit Vendor</a>
        <br>
        {!!Form::open(['action'=>['VendorsController@destroy', $vendor->id], 'method' => 'POST','class' => 'text-left']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close() !!}<br>

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
                        <p>No types found</p>
                        @endif
                    </tbody>
                </table>
                <a id="btn" href="/types/create">+ add new custom type!</a>
                <hr>
            </div>
            </div>
@endsection