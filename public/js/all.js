$( document ).ready(function() {
    $('form#settingsForm').on('submit', function (e) {
        e.preventDefault();
        console.log('I have been clicked');

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
});
//# sourceMappingURL=all.js.map
