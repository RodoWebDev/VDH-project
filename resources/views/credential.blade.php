@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="navbar-nav ml-auto flex-row justify-content-between">
        <li class="nav-item">
            {{ Auth::user()->name }}
        </li>
        <li class="nav-item">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <create-post />
        </div>
    </div>
    <ul class="navbar-nav ml-auto flex-row justify-content-between mt-4">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">< = back</a>
        </li>
    </ul>
</div>
@endsection