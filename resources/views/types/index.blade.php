@extends('layouts.app')

@section('content')
<h1 style="font-family:Tekton Pro Ext; font-size: 39px;">&nbsp;Store Product types</h1>
    <hr>
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
                            <td>{!!$type->description!!}</td>
                            <th>{{$type->group_id}}</th>
                            <th>{{$type->created_at}}</th>
                            <td>{{$type->updated_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <p>No types found</p><br>
            @endif
            <a href="/types/create">+ add new custom type!</a>
            </div>
    </div><br>
    @endsection