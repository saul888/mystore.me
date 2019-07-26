@extends('layouts.app')

@section('content')
<h2 style="font-family:Tekton Pro Ext; font-size: 38px;">&nbsp;Product Brands</h2>
<hr>

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
                </tbody>
            </table>
            @else
            <p>No posts found</p>
            @endif
        </div>
</div><br>
<a href="/products" class="btn btn-sm btn-block btn-secondary">Exit</a>
            <a href="/Brands/create" class="btn btn-sm btn-block btn-warning">+ add a new brand!</a>
@endsection