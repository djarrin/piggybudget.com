$( document ).ready(function() {

    //Intro Settings Form
    $('form#settingsForm').on('submit', function (e) {
        e.preventDefault();

        var emailTypes = $('input[name=emailType]:checked').map(function () {
            return $(this).val();
        }).get();

        $.ajax({
            url: '/createSettings',
            type: 'post',
            data: {
                _token: $('meta[name=csrf-token]').attr('content'),
                receiveEmails: $('input[name=receiveEmails]:checked').val(),
                emailType: emailTypes
            },
            success: function( data ) {
                console.log(data);
            },
            error: function(errorThrown) {

            }
        });

    });

    //Intro Income Info
    $('form#incomeForm').on('submit', function (e) {
        e.preventDefault();

        var incomeAmount = $('input#incomeAmount').val();
        var payCheckTimeType = $('input[name=payCheckTimeType]:checked').val();
        var payCheckTimeDay = $('select#payCheckTimeDay').val();
        var payCheckTimeDate = $('input#payCheckTimeDate').val();
        var savingsAmount = $('input#savingsAmount').val();
        var ccDebtAmount = $('input#ccDebtAmount').val();

        $.ajax({
            url: '/createIncome',
            type: 'post',
            data: {
                _token: $('meta[name=csrf-token]').attr('content'),
                incomeAmount: incomeAmount,
                payCheckTimeType: payCheckTimeType,
                payCheckTimeDay: payCheckTimeDay,
                payCheckTimeDate: payCheckTimeDate,
                savingsAmount: savingsAmount,
                ccDebtAmount: ccDebtAmount
            },
            success: function( data ) {
                console.log(data);
            },
            error: function(errorThrown) {

            }
        });

    });
});