@extends('layouts.app')

@section('content')
<h1 style="font-family:Bradley Hand ITC; font-size: 48px;">&nbsp;Store Items</h1>
<hr>

<div class="card shadow">
        <div class="card-body">
        <table id="table_id" class="display">
            <thead>
                <tr style="background-color:lightgrey">
                    <th>Id</th>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Barcode</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
            @if(count($items) > 0)
            @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td><a href="/items/{{$item->id}}">{{$item->title}}</a></td>
                    <td>{{$item->company}}</td>
                    <td>{{$item->barcode}}</td>
                    <th>{{$item->type_id}}</th>
                    <th>{{$item->quantity}}</th>
                    <td>{{$item->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No posts found</p>
        @endif
        <a href="/items/create">+ add a new item!</a>
        </div>
</div><br>
@endsection