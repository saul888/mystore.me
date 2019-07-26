@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-secondary">Go Back</a><br><br>
    <h1>{{$post->title}}</h1>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>written on {{$post->created_at}}</small>
    <hr>
    @if(!Auth::guest())
    <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>
    {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method' => 'POST','class' => 'text-right']) !!}
       {{Form::hidden('_method', 'DELETE')}}
       {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
@endsection