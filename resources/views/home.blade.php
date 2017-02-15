@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


                @if( isset($userLoggedIn) AND $userInfo['intro_survey_completed'])
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            You are logged in!
                        </div>
                    </div>
                @elseif(isset($userLoggedIn) AND !$userInfo['intro_survey_completed'])
                    <div class="panel panel-default">
                        <div class="panel-heading">User Settings</div>

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
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Income Information</div>
                        <div id="income_information" class="panel-body">
                            {{ Form::open(array('action' => 'HomeController@userIncomeCreate', 'method' => 'post', 'id' => 'incomeForm')) }}

                            <div class="form-group income_amount">
                                {{ Form::label('incomeAmount', 'How much do you normally receive per paycheck?') }}
                                ${{ Form::number('incomeAmount', 'incomeAmount', ['required' => 'required', 'placeholder' => '0.00', 'step' => 'any']) }}
                            </div>

                            <div class="form-group paycheck_time_type">
                                {{ Form::label('payCheckTimeType', 'How often do you get paid?') }}
                                <label>Once a week</label>
                                {{ Form::radio('payCheckTimeType', 'onceAWeek') }}
                                <label>Once every two weeks</label>
                                {{ Form::radio('payCheckTimeType', 'onceEveryTwoWeeks', true) }}
                                <label>Twice a month</label>
                                {{ Form::radio('payCheckTimeType', 'twiceAMonth') }}
                                <label>Once a month</label>
                                {{ Form::radio('payCheckTimeType', 'onceAMonth') }}
                            </div>

                            <div class="form-group paycheck_time_date">
                                {{ Form::label('payCheckTimeDay', 'What day of the week do you normally get paid?') }}
                                {{ Form::select('payCheckTimeDay', ['monday'    => 'Monday',
                                                                    'tuesday'   => 'Tuesday',
                                                                    'wednesday' => 'Wednesday',
                                                                    'thursday'  => 'Thursday',
                                                                    'friday'    => 'Friday',
                                                                    'saturday'  => 'Saturday',
                                                                    'sunday'    => 'Sunday'
                                                                    ])
                                 }}
                                <br />
                                {{ Form::label('payCheckTimeDate', 'What date did you last recieve a paycheck?') }}
                                {{ Form::date('payCheckTimeDate') }}
                            </div>

                            <div class="form-group base_financial_information">
                                {{ Form::label('savingsAmount', 'How much do you currently have in savings?') }}
                                ${{ Form::number('savingsAmount', 'savingsAmount', ['required' => 'required', 'placeholder' => '0.00', 'step' => 'any']) }}
                                <br>
                                {{ Form::label('ccDebtAmount', 'How much do credit card do you currently have?') }}
                                ${{ Form::number('ccDebtAmount', 'ccDebtAmount', ['required' => 'required', 'placeholder' => '0.00', 'step' => 'any']) }}
                            </div>

                            {{ Form::submit('Next Step') }}

                            {{ Form::close()  }}
                        </div>
                    </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Expenses Information</div>
                    <div id="income_information" class="panel-body">
                        {{ Form::open(array('action' => 'HomeController@userExpensesCreate', 'method' => 'post', 'id' => 'expenseForm')) }}

                        <expenseForm> <ul id="expenses">

                                <input type="text" name="expense_label_1" v-model="expense">
                                <label for="expense-1">How much do you pay each month for your @{{ expense }}</label>

                            </ul></expenseForm>

                        <div class="form-group housing">
                            {{ Form::label('rentPayment', 'How much do you pay each month for your rent or mortgage?') }}
                            {{ Form::number('rentPayment', 'rentPayment', ['placeholder' => '0.00', 'step' => 'any']) }}
                            {{ Form::label('rentPaymentTime', 'What day of the month is your rent or mortgage bill due?') }}
                            {{ Form::select('rentPaymentTime', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]) }}
                        </div>

                        <div class="form-group electrical">
                            {{ Form::label('electricalPayment', 'How much do you pay each month for your electricity?') }}
                            {{ Form::number('electricalPayment', 'electricalPayment', ['placeholder' => '0.00', 'step' => 'any']) }}
                            {{ Form::label('electricalPaymentTime', 'What day of the month is your electrical bill due?') }}
                            {{ Form::select('electricalPaymentTime', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]) }}
                        </div>

                        <div class="form-group electrical">
                            {{ Form::label('electricalPayment', 'How much do you pay each month for your electricity?') }}
                            {{ Form::number('electricalPayment', 'electricalPayment', ['placeholder' => '0.00', 'step' => 'any']) }}
                            {{ Form::label('electricalPaymentTime', 'What day of the month is your electrical bill due?') }}
                            {{ Form::select('electricalPaymentTime', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]) }}
                        </div>

                        <div class="form-group tv">
                            {{ Form::label('tvPayment', 'How much do you pay each month for your television?') }}
                            {{ Form::number('tvPayment', 'tvPayment', ['placeholder' => '0.00', 'step' => 'any']) }}
                            {{ Form::label('tvPaymentTime', 'What day of the month is your tv bill due?') }}
                            {{ Form::select('tvPaymentTime', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]) }}
                        </div>

                        <div class="form-group internet">
                            {{ Form::label('internetPayment', 'How much do you pay each month for your internet?') }}
                            {{ Form::number('internetPayment', 'internetPayment', ['placeholder' => '0.00', 'step' => 'any']) }}
                            {{ Form::label('internetPaymentTime', 'What day of the month is your internet bill due?') }}
                            {{ Form::select('internetPaymentTime', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]) }}
                        </div>

                        {{ Form::submit('All Finished') }}

                        {{ Form::close() }}

                    </div>
                </div>



                @else
                    <p>would you like to <a href="{{ url('/register') }}">Signup</a> or <a href="{{ url('/login') }}">log in</a>?</p>
                @endif


        </div>
    </div>
</div>
@endsection
