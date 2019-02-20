@extends('layouts.app') 
@section('content')
<div class="form-group mt-4  card card-body bg-light">
    <h1>Edit Post</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {!! Form::open(['action' => ['PostsController@update', $post[0]->id], 'method' => 'PUT']) !!} 
    {{Form::label('title', 'Title')}}
    {{Form::text('title', $post[0]->title , ['class' => 'form-control'])}} 
    {{ Form::label('body', 'Body') }} 
    {{ Form::textarea('body', $post[0]->body, ['id' => 'article-ckeditor', 'class' => 'form-control']) }}

    <div class="mt-2">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary mr-2">Cancel</a> {{ Form::submit('Submit',
        ['class' =>' btn btn-sm btn-primary']) }}
    </div>

    {!! Form::close() !!}
</div>
@endsection