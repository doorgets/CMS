$(window).ready(function() {
	$('body').on('click','.click-cart-plus',function(event) {
        event.preventDefault();
        var current = $(this);
        var currentHtml = current.html();
        $(this).html('<i class="fa fa-spinner fa-spin"></i>');
        $.get($(this).attr('href'),{},function(data){
            if (data.code == 200) {
                var counter = $('.tr-'+data.data.uri+' input').val();
                counter++;
                $('.tr-'+data.data.uri+' input').val(counter);
                $('.total-count-bottom .subtotal-cart-amount').html(data.data.subtotalAmountVat);
                $('.total-count-bottom .total-cart-amount').html(data.data.totalAmountPromoVat);
                $('.total-'+data.data.uri).html(data.data.newAmount);
            }
            current.html(currentHtml);
            console.log(data);
        },'json');
        return false;
    });
    $('body').on('click','.click-cart-minus',function(event) {
        event.preventDefault();
        var current = $(this);
        var currentHtml = current.html();
        current.html('<i class="fa fa-spinner fa-spin"></i>');
        $.get($(this).attr('href'),{},function(data){

            if (data.code == 200) {
                var counter = $('.tr-'+data.data.uri+' input').val();
                if (counter > 1) {
                    counter--;
                }
                $('.tr-'+data.data.uri+' input').val(counter);
                $('.total-count-bottom .subtotal-cart-amount').html(data.data.subtotalAmountVat);
                $('.total-count-bottom .total-cart-amount').html(data.data.totalAmountPromoVat);
                $('.total-'+data.data.uri).html(data.data.newAmount);
            }
            current.html(currentHtml);
            console.log(data);
        },'json');
        return false;
    });

	$('body').on('click','.click-cart-remove',function(event) {

		event.preventDefault();
		var current = $(this);
		var currentHtml = current.html();
		$.get($(this).attr('href'),{},function(data){
            if (data.code == 200) {
                $('.total-count-bottom .subtotal-cart-amount').html(data.data.subtotalAmountVat);
                $('.total-count-bottom .total-cart-amount').html(data.data.totalAmountPromoVat);
                
                $('.tr-'+data.data.uri).remove();
                if (data.data.count == 0) {
                	$('.checkout-to-go').remove();
                	$('.progress-checkout').remove();
                	window.location.replace("./?langue="+data.data.langue);
                }
            }
            current.html(currentHtml);
            console.log(data);
        },'json');
        return false;
	});

    $('body').on('click','.methodShipping',function(event){
        var current = $(this);
        var value = current.val();
        $.get(BASE_AJAX+"?controller=cart&action=shippingMethod&&lg="+CURRENT_LG+"&key="+value,{},function(data){
            $('.total-count-bottom .subtotal-cart-amount').html(data.data.subtotalAmountVat);
            $('.total-count-bottom .total-cart-amount').html(data.data.totalAmountPromoVat);
            $('.total-count-bottom .shipping-amount').html(data.data.shippingAmount);
        },'json');
    });
});