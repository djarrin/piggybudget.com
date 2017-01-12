@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                @if( isset($userLoggedIn) )
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                @else
                <p>would you like to <a href="{{ url('/register') }}">Signup</a> or <a href="{{ url('/login') }}">log in</a>?</p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
