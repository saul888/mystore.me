@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="card shadow">
            <div class="card-body">
                <div class="card-title"><h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3></div>
                <div class="card-text"><small>Written on {{$post->created_at}}</small></div>
            </div>
        </div><br>
        @endforeach
    @else
    <p>No posts found</p>
    @endif
@endsection