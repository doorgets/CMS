
$('.magnificpopup-parent-container').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery: {
        enabled:true
    }
});

$('.btn-form-contact input').on('click',function(event){

    event.preventDefault();
    var data = new FormData();
    var idForm = $(this).attr('id').replace('_submit','');
    var id = $(this).attr('id').replace('_inbox_submit','');
    var current = $(this);
    current.attr("disabled", "disabled");
    var currentHtml = current.html();
    current.html('<i class="fa fa-spinner fa-spin"></i>');
    $.ajax({
        url: BASE_URL + 'ajax/?controller=contact&action=sendForm&lg='+LG_CURRENT+'&uri='+MODULE_URI,
        type: 'POST',
        data: $("#"+idForm).serialize(),
        success: function(response, textStatus, jqXHR) {
            var rep = JSON.parse(response);
            if (rep.code == '200') {
                $('#'+idForm).append('<div class="alert alert-success text-center">'+rep.data+'</div>');
                window.setTimeout(function(){
                    location.reload();
                },5000);
            } else {
                $.each(rep.data,function(k,v){
                    $('#'+idForm + ' #'+k).addClass('i-error');
                    if (k == 'result_captcha') {
                        $('#'+idForm + ' #captcha_result').addClass('i-error');
                    }
                });
                current.removeAttr("disabled");
            }

            $('.i-error').on('click focus',function(){
                $(this).removeClass('i-error');
            });
            current.html(currentHtml);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            current.html(currentHtml);
        }
    });
});

$('.btn-form-comment input').on('click',function(event){

    event.preventDefault();
    var data = new FormData();
    var idForm = $(this).attr('id').replace('_submit','');
    var id = $(this).attr('id').replace('_comment_submit','');
    var current = $(this);
    current.attr("disabled", "disabled");
    var currentHtml = current.html();
    current.html('<i class="fa fa-spinner fa-spin"></i>');
    $.ajax({
        url: BASE_URL + 'ajax/?controller=comment&action=sendForm&lg='+LG_CURRENT+'&uri_module='+MODULE_URI+'&uri_content='+CONTENT_URI,
        type: 'POST',
        data: $("#"+idForm).serialize(),
        success: function(response, textStatus, jqXHR) {
            var rep = JSON.parse(response);
            
            if (rep.code == '200') {
                $('#'+idForm).append('<div class="alert alert-success text-center">'+rep.data+'</div>');
                window.setTimeout(function(){
                    location.reload();
                },5000);
            } else {
                $.each(rep.data,function(k,v){
                    $('#'+idForm + ' #'+k).addClass('i-error');
                    if (k == 'result_captcha') {
                        $('#'+idForm + ' #captcha_result').addClass('i-error');
                    }
                });
                current.removeAttr("disabled");
            }

            $('.i-error').on('click focus',function(){
                $(this).removeClass('i-error');
            });
            current.html(currentHtml);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            current.html(currentHtml);
        }
    });
});

// Onepage bug
$('.onepage-nav a').on('click', function(){
    if ($(window).width() < 769) {
        $('.btn-navbar').click();
        $('.navbar-toggle').click()     
    }

});

$(".onepage-nav ul li a[href^='#']").on('click', function(e) {

   // prevent default anchor click behavior
   e.preventDefault();

   // store hash
   var hash = this.hash;

   // animate
   $('html, body').animate({
       scrollTop: $(hash).offset().top
     }, 300, function(){

       // when done, add hash to url
       // (default click behaviour)
       window.location.hash = hash;
     });

});

// Rating 
$('.rating').rating({
  extendSymbol: function () {
    var title;
    $(this).on('rating.rateenter', function (e, rate) {
      title = rate;
      $('.int-stars').html(rate);
      if (rate > 1) {
        $('.int-stars-one').hide();
        $('.int-stars-more').show();
      } else {
        $('.int-stars-one').show();
        $('.int-stars-more').hide();
      }
      $('#doorgets_comment_stars').val(rate);
    })
    .on('rating.rateleave', function () {

    });
  }
});

// Comment
window.setTimeout(function(){
    $('.doorGets-comment .alert-success').hide();
},5000);

function checkSurvey() {
    var b = $('.survey-static');
    $.each(b,function(index,el){
        var btn = $(el).find('button');
        btn.on('click',function(){
            var allInput = b.find('input');
            var checked = b.find('input:checked');
            if (checked.length > 0) {
                var val = checked.val();
                allInput.attr('disabled','disabled');
                checked.closest('label').append('<i class="fa fa-check fa-lg green-c margin-0-10"><i>');
                $(this).attr('disabled','disabled');
                var uri_module = $(el).attr('id').replace('survey-','');
                var url = BASE_URL + 'ajax/?controller=survey&action=sendForm&lg='+LG_CURRENT+'&uri='+uri_module+'&value='+val;
                
                $.get(url , {} , function(data){
                    var rep = JSON.parse(data);

                    if (rep.code == 200) {
                        $.each(rep.data,function(index,el) {
                            var inputToChange = $('#survey-'+uri_module+' .optionsSurveyClass-'+index);
                            
                            if (inputToChange.length > 0 && el.count != 0) {
                                inputToChange.closest('label').append('('+el.count +')'+ ' '+el.percent+'%');
                            }
                        });
                    }
                });
            }
        }); 
    });
    
}
checkSurvey();


// Change template
$('#doorgets_change_template_submit').hide();
$('#doorgets_change_template_bootstrap_version').on('change',function(){
   $( "#doorgets_change_template_submit" ).trigger( "click" );
});

// Flash info
$('#flash').slideDown('slow');
setTimeout(function() {
    $('#flash').slideUp('slow');
}, 5000);

$('#closeFlash').click(function() {
    $('#flash').slideUp('slow');
});

// Admin action btn
$('div[class*=btn-front-edit-]').parent('div').each(function(index, el) {
    $(el).css('z-index','9999');
    // $(el).css('position','absolute');
    // $(el).css('right','22px');
    $(this).parent('div').css('border','none');
    $(this).css('border','none');
});


