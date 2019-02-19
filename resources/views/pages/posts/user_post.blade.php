@extends('layouts.app') 
@section('content') 

@if($data['post'])

<h3>{{$data['post']->title}}</h3>
<small>Written by {{$data['post']->user->name}} on {{$data['post']->created_at}}</small>
<hr>
<p>{{$data['post']->body}}</p>
<hr>
<div class="form-group">
{!! Form::open(['route' => ['comments.store'], 'method' => 'POST']) !!}
    {{Form::label('body', 'Comment')}}
    {{Form::textarea('body', '', ['class' => 'form-control', 'rows' => '2', 'cols' => '20'])}}
    {{ Form::hidden('post_id', $data['post_id']) }}
    {{ Form::submit('Reply', ['class' =>' btn btn-primary mt-2']) }}
{!! Form::close() !!}
</div>

<h4>Comments:</h4> 
 @foreach ($data['post']->comments as $comment)
<div class="list-group col-sm-6">
      <li class="list-group-item card mb-2">{{$comment->user->name}} said:
    <p>{{$comment->body}}</p>
    <small>{{$comment->created_at}}</small>
</li>
</div>
@endforeach 

@else 
<p>Error loading user post</p>
@endif 

<a href="/posts" class="btn btn-secondary btn-sm" tabindex="-1" role="button" aria-disabled="true">Bo back</a>
@endsection