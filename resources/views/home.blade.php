@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                @if( isset($userLoggedIn) AND $userInfo['intro_survey_completed'])
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                @elseif(isset($userLoggedIn) AND !$userInfo['intro_survey_completed'])
                    <div class="panel-heading">Intro Survey</div>

                    <div id="base_info_entry_survey" class="panel-body">
                        {{ Form::open(array('action' => 'HomeController@userSettingsCreate', 'method' => 'post', 'id' => 'settingsForm')) }}

                        <div class="form-group receive_email">
                            {{ Form::label('receiveEmails', 'Would you like to recieve emails at all?') }}
                            <label>yes</label>
                            {{ Form::radio('receiveEmails', 'yes', true) }}
                            <label>no</label>
                            {{ Form::radio('receiveEmails', 'no') }}
                        </div>

                        <div class="form-group email_type">
                            {{ Form::label('emailType', 'What type of emails would you like to receive?') }}
                            <label>Weeks Upcoming Bills</label>
                            {{ Form::checkbox('emailType', 'weeklyBills') }}
                            <label>This Months Bills</label>
                            {{ Form::checkbox('emailType', 'monthsBills' ) }}
                            <label>This Paychecks Bills</label>
                            {{ Form::checkbox('emailType', 'paycheckBills') }}
                            <label>Credit Card Payment Payment Suggestion</label>
                            {{ Form::checkbox('emailType', 'ccPayment') }}
                        </div>

                        {{ Form::submit('Next Step') }}


                        {{ Form::close() }}
                    </div>



                @else
                    <p>would you like to <a href="{{ url('/register') }}">Signup</a> or <a href="{{ url('/login') }}">log in</a>?</p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
