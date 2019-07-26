@extends('layouts.app')

@section('content')
<h1 style="font-family:Bradley Hand ITC; font-size: 46px;">&nbsp;Chain Stores</h1>
<hr>
    <div class="card shadow">
            <div class="card-body">
            <table id="table_id" class="display">
                    <thead>
                        <tr style="background-color:lightgrey">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($store) > 0)
                    @foreach($store as $stores)
                        <tr>
                            <td>{{$stores->id}}</td>
                            <td><a href="/store/{{$stores->id}}">{{$stores->title}}</a></td>
                            <td>{!!$stores->description!!}</td>
                            <td>{{$stores->location}}</td>
                            <th>{{$stores->type}}</th>
                            <td>{{$stores->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <p>No types found</p>
            @endif
            <a href="/store/create">+ add new store!</a>
        </div>
    </div><br>
@endsection