@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="font-family:Tekton Pro Ext; font-size: 40px;">&nbsp;Groups of Items</h1>
    <hr>
    <div class="card shadow">
        <hr>
        <div class="card-body">
        <table id="table_id" class="display">
                <thead>
                    <tr style="background-color:lightgrey">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Storage</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($products) > 0)
                @foreach($products as $groups)
                    <tr>
                        <td>{{$groups->id}}</td>
                        <td><a href="/products/{{$groups->id}}">{{$groups->title}}</a></td>
                        <td>{!!$groups->description!!}</td>
                        <td>{{$groups->status}}</td>
                        <td>{{$groups->storage}}</td>
                        <td>{{$groups->created_at}}</td>
                    </tr>
                    @endforeach
                    @else
                    <p>No products found</p>
                    @endif
                </tbody>
            </table>
            <a id="btn" href="/products/create">+ new custom Group!</a>
            <hr>
        </div>
        </div>
        <br>
        <a href="/types" class="btn btn-sm btn-block btn-secondary">Types</a>
        <a href="/items" class="btn btn-sm btn-block btn-warning">Items</a><br>
    </div>
@endsection