@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="font-family:Bradley Hand ITC; font-size: 44px;">&nbsp;Shops</h1>
    <hr>
    <div class="card shadow">
        <hr>
        <div class="card-body">
        <table id="table_id" class="display">
                <thead>
                    <tr style="background-color:lightgrey">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($shops) > 0)
                @foreach($shops as $shop)
                    <tr>
                        <td>{{$shop->id}}</td>
                        <td><a href="/shops/{{$shop->id}}">{{$shop->title}}</a></td>
                        <td>{!!$shop->location!!}</td>
                        <td>{!!$shop->type!!}</td>
                        <td>{{$shop->description}}</td>
                        <td>{{$shop->created_at}}</td>
                    </tr>
                    @endforeach
                    @else
                    <p>No shops found</p>
                    @endif
                </tbody>
            </table>
            <a id="btn" href="/shops/create">+ new Shop!</a>
            <hr>
        </div>
        </div>
        <br>
    </div>

@endsection