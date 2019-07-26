@extends('layouts.app')

@section('content')
    <h1>Edit Group</h1>
    {!! Form::open(['action' => ['ProductsController@update', $groups->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Group Name')}}
            {{Form::text('title',$groups->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description',$groups->description,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}
                <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('article-ckeditor');
                </script>
            </div>
            <div class="form-group">
                    {{Form::label('status','Group Status')}}
                    {{Form::text('status',$groups->status,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Status'])}}
                </div>
                <div class="form-group">
                    {{Form::label('store_id','Store')}}
                    {{Form::text('store_id',$groups->store_id,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Store'])}}
                </div>
                <div class="form-group">
                        {{Form::label('storage','Storage method')}}
                        {{Form::text('storage',$groups->storage,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Storage'])}}
                    </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!} <br>
                <a href="/products/{{$groups->id}}" class="btn btn-block btn-secondary">Cancel</a>
@endsection