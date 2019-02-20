@extends('layouts.app') 
@section('content') 

@if($data['post'])

<h3>{{$data['post']->title}}</h3>
<small>Written by {{$data['post']->user->name}} on {{$data['post']->created_at}}</small>
<hr>
<p>{{$data['post']->body}}</p>
@if (Auth::user()->id === $data['post']->user->id)
<div class="buttons d-flex">
<a href="/posts/{{$data['post_id']}}/edit" class="btn btn-sm btn-secondary mr-2"> Edit </a>
{!!Form::open(['action' => ['PostsController@destroy', $data['post']->id], 'method' => 'DELETE'])!!}
{{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger mr-2', 'id' => 'delete-btn'])}}
{!!Form::close()!!}  
</div>  
@endif

<hr>

<div class="form-group">
{!! Form::open(['route' => ['comments.store'], 'method' => 'POST']) !!}
    {{Form::label('body', 'Comment')}}
    {{Form::textarea('body', '', ['class' => 'form-control', 'rows' => '2', 'cols' => '20'])}}
    {{ Form::hidden('post_id', $data['post_id']) }}
    {{ Form::submit('Reply', ['class' =>' btn btn-sm btn-primary mt-2']) }}
{!! Form::close() !!}
</div>

<h4>Comments:</h4> 
@foreach ($data['post']->comments as $comment)
<div class="list-group col-sm-6">
      <li class="list-group-item card mb-2">
            @if (Auth::user()->id === $comment->user->id)
            <strong>{{$comment->user->name}}</strong>
            @else
            {{$comment->user->name}}
        @endif 
        said:   
    <p>{{$comment->body}}</p>
    <small>{{$comment->created_at}}</small>
    @if(Auth::user()->id === $comment->user->id)
    <div class="buttons d-flex">
        {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'DELETE'])!!}
       {{Form::submit('Delete', ['class' => 'btn btn-danger mr-2', 'id' => 'delete-btn'])}}
       {!!Form::close()!!}       
       </div>
        @endif
</li>
</div>
@endforeach 

@else 
<p>Error loading user post</p>
@endif 

<a href="/posts" class="btn btn-outline-secondary btn-sm" tabindex="-1" role="button" aria-disabled="true">Bo back</a>
@endsection