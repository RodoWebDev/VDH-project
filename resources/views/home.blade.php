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
            <ul class="navbar-nav ml-auto flex-row justify-content-between mt-4">
                <li class="nav-item w-100">
                    <a class="nav-link d-flex justify-content-center mb-4" href="{{ url('/credential/1') }}">
                        <div class="credential border d-flex justify-content-center align-items-center">
                            <i class="fa fa-upload"></i>
                            <h2 class="text-secondary">Credential 1</h2>
                        </div>
                    </a>
                    <a class="nav-link d-flex justify-content-center" href="{{ url('/credential/2') }}">
                        <div class="credential border d-flex justify-content-center align-items-center">
                            <i class="fa fa-upload"></i>
                            <h2 class="text-secondary">Credential 2</h2>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection