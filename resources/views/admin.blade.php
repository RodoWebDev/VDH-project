@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <all-posts />
    </div>
  </div>
  <ul class="navbar-nav ml-auto flex-row justify-content-between mt-4">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/login') }}">< = back</a>
    </li>
  </ul>
</div>
@endsection