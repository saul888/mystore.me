@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome to mystore :) <i class='fab fa-apple' style='font-size:48px;color:red'></i></h1>
    <p>making store simpler!</p>
    @if(Auth::guest())
    <a class="btn btn-primary btn-block btn-lg loading" href="/login" role="button">Login</a>
        <a class="btn btn-success btn-block btn-lg" href="/register" role="button">Register</a>
    @endif
    @if(!Auth::guest())
    <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://awge.com/"></iframe>
          </div>
          @endif
</div>
@endsection
