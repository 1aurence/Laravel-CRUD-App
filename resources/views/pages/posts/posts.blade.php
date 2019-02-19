@extends('layouts.app') 
@section('content')

<h1>Posts</h1>
{{$posts}}

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
 @if(count($posts) > 0) 
 
 @foreach ($posts as $post)

<ul class="list-group">
    <li class="list-group-item card mb-2">
    <a href="/post/{{$post->id}}">{{$post->title}}</a>
    <br>
        <small>Written on {{$post->created_at}} by {{$post->user['name']}}</small>
        <p>{{ str_limit($post->body, $limit = 280, $end = '...') }}</p>
        <a href="/post/{{$post->id}}" class="text-muted">View post</a>
    </li>
</ul>

@endforeach {{ $posts->links() }} 

@else
<p>There are currently no posts</p>
@endif
<a href="/posts/create" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Create post</a>
@endsection