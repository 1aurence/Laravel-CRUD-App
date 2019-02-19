@extends('layouts.app') 
@section('content')

<h1>Dashboard</h1>
<h3>Your posts...</h3>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif @if (count($posts) > 0) @foreach ($posts as $post)
<ul class="list-group col-sm-6">
    <li class="list-group-item card mb-2">
        <a href="/post/{{$post->id}}">{{$post->title}}</a>
        <br>
        <small>Written on {{$post->created_at}} by {{$post->user['name']}}</small>
        <p>{{ str_limit($post->body, $limit = 280, $end = '...') }}</p>
        <a href="/post/{{$post->id}}" class="text-muted">View post</a> 
        <div class="buttons d-flex">
                <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary mr-2"> Edit </a>
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE'])!!}
                {{Form::submit('Delete', ['class' => 'btn btn-danger mr-2', 'id' => 'delete-btn'])}}
                {!!Form::close()!!}  
                </div> 
        <script>
            $('#delete-btn').click(() => confirm('Are you sure?'))
        </script>
    </li>
</ul>
@endforeach @else
<p>You currently have no posts...</p>
<a href="/posts/create" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Create post</a> @endif
@endsection