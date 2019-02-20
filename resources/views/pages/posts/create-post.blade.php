@extends('layouts.app') 
@section('content')

<div class="form-group mt-4 card card-body bg-light">
        <h1>Create Post</h1>
{!! Form::open(['action' => 'PostsController@store']) !!} 

{{Form::label('title', 'Title')}}
{{Form::text('title','', ['class' => 'form-control'])}} 

{{ Form::label('body', 'Body', ['class' => 'mt-2']) }}
{{ Form::textarea('body','', ['id' => 'article-ckeditor', 'class' => 'form-control']) }}


{{ Form::submit('Create', ['class' =>' btn btn-primary mt-2']) }}

{!! Form::close() !!}
</div>
@endsection