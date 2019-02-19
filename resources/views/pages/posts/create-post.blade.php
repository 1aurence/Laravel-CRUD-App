@extends('layouts.app') 
@section('content')

<div class="form-group mt-4 col-sm-6 card card-body bg-light">
        <h1>Create Post</h1>
{!! Form::open(['route' => 'posts.store']) !!} 

{{Form::label('title', 'Title')}}
{{Form::text('title','', ['class' => 'form-control'])}} 

{{ Form::label('body', 'Body') }}
{{ Form::textarea('body','', ['class' => 'form-control']) }}


{{ Form::submit('Create', ['class' =>' btn btn-primary mt-2']) }}

{!! Form::close() !!}
</div>
@endsection