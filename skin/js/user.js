
$().ready(function() {

    tinymce.init({selector:'.tinymce'});
    
    $('#flash').slideDown('slow');
    setTimeout(function() {
        $('#flash').slideUp('slow');
    }, 5000);
    
    $('#closeFlash').click(function() {
    
        $('#flash').slideUp('slow');
    });
    
    $( ".datepicker" ).datepicker({
        
        changeMonth: true,
        changeYear: true
    });
    
    $( ".datepicker-from" ).datepicker({
        maxDate: '0',
        dateFormat : "dd-mm-yy",
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        onClose: function( selectedDate ) {
            $( ".datepicker-to" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    
    $( ".datepicker-to" ).datepicker({
        defaultDate: "+1w",
        dateFormat : "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        maxDate: '0',
        onClose: function( selectedDate ) {
            $( ".datepicker-from" ).datepicker( "option", "maxDate", selectedDate );
        }
        
    });
    
    var boxes = $('input[type=checkbox]:checked');
    $(boxes).next('span').attr('class','in-check-ok');
    
    $( "input[type=checkbox]" ).on( "click", function() {
        if ($(this).is(':checked')) {
            $(this).next('span').attr('class','in-check-ok');
        }else{
            $(this).next('span').attr('class','in-check');
        }
    });
});

