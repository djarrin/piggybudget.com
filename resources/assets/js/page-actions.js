
$( document ).ready(function() {
    $( "#payCheckTimeDate" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });


});
var expense = new Vue({
    el: '#expenses',
    data: {
        expense: 'Rent'
    }
});
