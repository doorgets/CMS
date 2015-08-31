$().ready(function() {
    
    

    $('.magnificpopup-parent-container').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled:true
        }
    });

});


$('#flash').slideDown('slow');
setTimeout(function() {
    $('#flash').slideUp('slow');
}, 5000);

$('#closeFlash').click(function() {

    $('#flash').slideUp('slow');
});

$('div[class*=btn-front-edit-]').parent('div').mouseover(function() {

    $(this).css('z-index','9999');


});
$('div[class*=btn-front-edit-]').parent('div').mouseout(function() {

    $(this).css('border','none');
    $(this).parent('div').css('border','none');

});
