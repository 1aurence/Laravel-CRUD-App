@extends('layouts.app') 
@section('content')

<div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a sample CRUD app using Laravel</p>
        <hr class="my-4">
        {{-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> --}}
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="/dashboard" role="button">My dashboard</a>
        </p>
      </div>
      @endsection