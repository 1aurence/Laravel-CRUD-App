@extends('layouts.app') 
@section('content') 

@if($post)

<h3>{{$post->title}} {{$post->id}}</h3>

<small>Written by {{$post->user->name}} on {{$post->created_at}}</small>
<hr>
<p>{{$post->body}}</p>
<hr>
<div class="form-group">
{!! Form::open(['route' => ['comments.store'], 'method' => 'POST']) !!}
    {{Form::label('body', 'Comment')}}
    {{Form::textarea('body', '', ['class' => 'form-control', 'rows' => '2', 'cols' => '20'])}}
    {{ Form::hidden('post_id', $post->id) }}
    {{ Form::submit('Reply', ['class' =>' btn btn-primary mt-2']) }}

{!! Form::close() !!}
</div>
<h4>Comments:</h4>
{{-- @foreach ($comments as $comment)
<div>
    <p>{{$comment->user}} said</p>
    <p>{{$comment->body}}</p>
    <small>{{$comment->created_at}}</small>
</div>

@endforeach  --}}
@else
<p>Error loading user post</p>

@endif

<a href="/posts" class="btn btn-secondary btn-sm" tabindex="-1" role="button" aria-disabled="true">Bo back</a>
@endsection