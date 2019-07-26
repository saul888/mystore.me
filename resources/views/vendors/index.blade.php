@extends('layouts.app')

@section('content')
<h1>Store Suppliers</h1>
<hr>
<div class="card shadow">
    <div class="card-body">
        <table id="table_id" class="display">
                <thead>
                    <tr style="background-color:lightgrey">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($vendors) > 0)
                @foreach($vendors as $vendor)
                    <tr>
                        <td>{{$vendor->id}}</td>
                        <td><a href="/Vendors/{{$vendor->id}}">{{$vendor->name}}</a></td>
                        <td>{!!$vendor->description!!}</td>
                        <th>{{$vendor->phone}}</th>
                        <th>{{$vendor->email}}</th>
                        <th>{{$vendor->address}}</th>
                        <td>{{$vendor->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <p>No types found</p><br>
        @endif
        <a href="/Vendors/create">+ add a new vendor!</a>
    </div>
</div>
        <a href="/store" class="btn btn-sm btn-block btn-warning"><marquee width="6%" style="text-align: left;" scrollamount="7" behavior="alternate" direction="right">Exit&nbsp;&nbsp;Store</marquee></a><br>
@endsection