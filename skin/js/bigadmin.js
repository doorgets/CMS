$(window).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();
    
    $('.btn').click(function(event) {
        if (!$(this).hasClass('no-loader')) {
            $(this).fadeOut();
            $('#preloader').fadeIn();            
        }

    });
    
    $('.bt-move-up').click(function(event) {
        $(this).fadeOut();
        $('#preloader').fadeIn();
    });

    $('.bt-move-down').click(function(event) {
        $(this).fadeOut();
        $('#preloader').fadeIn();
    });

    $("#myTab a").click(function(e){
        e.preventDefault();
        $(this).tab('show');
    });
    
    $('a').click(function () {
       $(this).blur(); 
    });

    function doClickPlus() {
        $(".btn-plus").click(function() {
            $(this).hide();
            $(this).next('.box-moins').fadeIn();
        });
        $(".btn-moins").click(function() {
            $(this).parent().prev(".btn-plus").show();
            $(this).parent('.box-moins').hide();
        });        
    }
    
    doClickPlus()
    
    $('#flash').slideDown('slow');
    setTimeout(function() {
        $('#flash').slideUp('slow');
    }, 5000);
    
    $('#closeFlash').click(function() {
    
        $('#flash').slideUp('slow');
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
    
    $('#go-to-racc select').change(function() {
        if ($(this).val() != '') {
            $(location).attr('href',$(this).val());
        }
        
    });
    
    function doSortable() {
        var ii = 1;
        $( "#sortable li" ).each(function() {
            
            $( this  ).find('.input-label').attr( "name", "input-label-" + ii);
            $( this  ).find('.input-info').attr( "name", "input-info-" + ii);
            $( this  ).find('.input-css').attr( "name", "input-css-" + ii);
            $( this  ).find('.input-obligatoire').attr( "name", "input-obligatoire-" + ii);
            $( this  ).find('.input-liste').attr( "name", "input-liste-" + ii);
            $( this  ).find('.input-filter').attr( "name", "input-filter-" + ii);
            $( this  ).find('.input-type').attr( "name", "input-type-" + ii);
            $( this  ).find('.input-active').attr( "name", "input-active-" + ii);
            $( this  ).find('.input-value').attr( "name", "input-value-" + ii);
            $( this  ).find('.input-value').attr( "value", "field-" + ii);
            
            $( this  ).find('.input-zip').attr( "name", "input-zip-" + ii);
            $( this  ).find('.input-png').attr( "name", "input-png-" + ii);
            $( this  ).find('.input-jpg').attr( "name", "input-jpg-" + ii);
            $( this  ).find('.input-gif').attr( "name", "input-gif-" + ii);
            $( this  ).find('.input-pdf').attr( "name", "input-pdf-" + ii);
            $( this  ).find('.input-swf').attr( "name", "input-swf-" + ii);
            $( this  ).find('.input-doc').attr( "name", "input-doc-" + ii);
            
            ii++;
        
        }); 
    }
    
    function doSortableEdit() {
        var ii = 1;
        $( "#editsortable li" ).each(function() {
            
            $( this  ).find('.input-label').attr( "name", "input-label-" + ii);
            $( this  ).find('.input-info').attr( "name", "input-info-" + ii);
            $( this  ).find('.input-css').attr( "name", "input-css-" + ii);
            $( this  ).find('.input-obligatoire').attr( "name", "input-obligatoire-" + ii);
            $( this  ).find('.input-liste').attr( "name", "input-liste-" + ii);
            $( this  ).find('.input-filter').attr( "name", "input-filter-" + ii);
            $( this  ).find('.input-type').attr( "name", "input-type-" + ii);
            $( this  ).find('.input-value').attr( "name", "input-value-" + ii);
            $( this  ).find('.input-active').attr( "name", "input-active-" + ii);
            
            $( this  ).find('.input-zip').attr( "name", "input-zip-" + ii);
            $( this  ).find('.input-png').attr( "name", "input-png-" + ii);
            $( this  ).find('.input-jpg').attr( "name", "input-jpg-" + ii);
            $( this  ).find('.input-gif').attr( "name", "input-gif-" + ii);
            $( this  ).find('.input-pdf').attr( "name", "input-pdf-" + ii);
            $( this  ).find('.input-swf').attr( "name", "input-swf-" + ii);
            $( this  ).find('.input-doc').attr( "name", "input-doc-" + ii);
            
            ii++;
        
        }); 
    }
    
    $( "#sortable" ).sortable({
        revert: true,
    });
    
    $( "#editsortable" ).sortable({
        revert: true,
    });
    
    $( ".draggable" ).draggable({
        connectToSortable: "#sortable",
        helper: "clone",
        revert: "invalid",
        stop:   function( event, ui ) {
            $(ui.helper).addClass("is-online");
            $( "#sortable li div.hid" ).show();
            $(".close-me").click(function() {
                var parent_li = $(this).closest('li');
                parent_li.fadeOut('slow', function() {$(this).remove();});
            });
            doClickPlus()
        }
        
    });
    
    $( "ul, li" ).disableSelection();
    
    doSortable();
    $( "#sortable" ).mouseout(function() { doSortable(); });
    doSortableEdit();
    $( "#editsortable" ).mouseout(function() { doSortableEdit(); });
    
    $(".close-me").click(function() {
        parent_li = $(this).closest('li');
        parent_li.fadeOut('slow', function() {$(this).remove();});
    });
    
    // ----------------------
    
    $( "#tabs" ).tabs();
    
    // ----------------------
    
    $("#modules_addblog_nom").keyup(function() {

        var str = $(this).val();
        str = copyWordsTirer(str);
        
        $("#modules_addblog_uri").val(str);
        
    });
    $("#modules_addblog_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addblog_meta_titre").val(str);
        
    });
    $("#modules_addblog_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addblog_meta_description").val(str);
        
    });

    // ----------------------
    
    $("#modules_addshop_nom").keyup(function() {

        var str = $(this).val();
        str = copyWordsTirer(str);
        
        $("#modules_addshop_uri").val(str);
        
    });
    $("#modules_addshop_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addshop_meta_titre").val(str);
        
    });
    $("#modules_addshop_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addshop_meta_description").val(str);
        
    });
    
    // --------------------------
    
    $("#modules_addmultipage_nom").keyup(function() {

        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addmultipage_uri").val(str);        
    });
    $("#modules_addmultipage_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addmultipage_meta_titre").val(str);
        
    });
    $("#modules_addmultipage_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addmultipage_meta_description").val(str);
        
    });
    
    // ----------------------
    
    $("#modules_addpage_nom").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addpage_uri").val(str);        
    });
    $("#modules_addpage_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addpage_meta_titre").val(str);
        
    });
    $("#modules_addpage_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addpage_meta_description").val(str);
        
    });

    // ----------------------
    
    $("#modules_addonepage_nom").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addonepage_uri").val(str);        
    });
    $("#modules_addone_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addonepage_meta_titre").val(str);
        
    });
    $("#modules_addonepage_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addonepage_meta_description").val(str);
        
    });
    
    // ----------------------
    $("#modules_addpartner_nom").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addpartner_uri").val(str);        
    });
    $("#modules_addpartner_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addpartner_meta_titre").val(str);
        
    });
    $("#modules_addpartner_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addpartner_meta_description").val(str);
        
    });
    // ----------------------
    $("#modules_addinbox_nom").keyup(function() {

        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addinbox_uri").val(str);        
    });
    $("#modules_addinbox_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addinbox_meta_titre").val(str);
        
    });
    $("#modules_addinbox_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addinbox_meta_description").val(str);
        
    });
    // ----------------------
    $("#modules_addapplicationjob_nom").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addapplicationjob_uri").val(str);        
    });
    $("#modules_addapplicationjob_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addapplicationjob_meta_titre").val(str);
        
    });
    $("#modules_addapplicationjob_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addapplicationjob_meta_description").val(str);
        
    });
    // ----------------------
    $("#modules_addnews_nom").keyup(function() {

        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addnews_uri").val(str);
        
    });
    $("#modules_addnews_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addnews_meta_titre").val(str);
        
    });
    $("#modules_addnews_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addnews_meta_description").val(str);
        
    });
    // ----------------------
    $("#modules_addsharedlinks_nom").keyup(function() {

        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addsharedlinks_uri").val(str);
        
    });
    $("#modules_addsharedlinks_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addsharedlinks_meta_titre").val(str);
        
    });
    $("#modules_addsharedlinks_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addsharedlinks_meta_description").val(str);
        
    });
    // ----------------------
    $("#modules_addvideo_nom").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addvideo_uri").val(str);        
    });
    $("#modules_addvideo_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addvideo_meta_titre").val(str);
        
    });
    $("#modules_addvideo_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addvideo_meta_description").val(str);
        
    });
    // ----------------------
    $("#modules_addimage_nom").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addimage_uri").val(str);        
    });
    $("#modules_addimage_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addimage_meta_titre").val(str);
        
    });
    $("#modules_addimage_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addimage_meta_description").val(str);
        
    });
    // ----------------------
    $("#modules_addfaq_nom").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addfaq_uri").val(str);        
    });
    $("#modules_addfaq_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modules_addfaq_meta_titre").val(str);
        
    });
    $("#modules_addfaq_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modules_addfaq_meta_description").val(str);
        
    });
    // ----------------------
    $("#modules_addblock_titre").keyup(function() {

        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addblock_uri").val(str);        
    });
    // ----------------------
    $("#modules_addsurvey_titre").keyup(function() {

        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addsurvey_uri").val(str);        
    });
    // ----------------------
    $("#modules_addcarousel_titre").keyup(function() {

        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addcarousel_uri").val(str);        
    });
    // ----------------------
    $("#modules_addlink_nom").keyup(function() {

        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modules_addlink_uri").val(str);        
    });
    // ----------------------
    $("#modulecategory_add_nom").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#modulecategory_add_uri").val(str);        
    });
    $("#modulecategory_add_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modulecategory_add_meta_titre").val(str);
        
    });
    $("#modulecategory_add_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modulecategory_add_meta_description").val(str);
        
    });
    // ----------------------
    $("#modulecategory_edit_titre").keyup(function() {
    
        var str = $(this).val();
        $("#modulecategory_edit_meta_titre").val(str);
        
    });
    $("#modulecategory_edit_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#modulecategory_edit_meta_description").val(str);
        
    });
    // ----------------------
    $("#modules_addgenform_titre").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);  
        $("#modules_addgenform_uri").val(str);        
    });
    // ----------------------
    // ----------------------
    $("#media_add_title").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#media_add_uri").val(str);        
    });
    // ----------------------
    $("#groupes_add_title").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#groupes_add_uri").val(str);        
    });
    // ----------------------
    $("#attributes_add_title").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#attributes_add_uri").val(str);        
    });
    // ----------------------
    $("#emailnotification_add_title").keyup(function() {
    
        var str = $(this).val();
        str = copyWordsTirer(str);
        $("#emailnotification_add_uri").val(str);        
    });
    // ----------------------
    // ----------------------
    
    function copyWords(str) {
        
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();
        
        var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
        var to   = "aaaaaeeeeeiiiiooooouuuunc      ";
        
        for (var i=0, l=from.length ; i<l ; i++) {
          str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }
        
        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
          .replace(/\s+/g, '') // collapse whitespace and replace by -
          .replace(/-+/g, ''); // collapse dashes
          
        return str
    }
    function copyWordsTirer(str) {
        
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();
        
        var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
        var to   = "aaaaaeeeeeiiiiooooouuuunc      ";
        
        for (var i=0, l=from.length ; i<l ; i++) {
          str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }
        
        str = str.replace(/[^a-z0-9 -]/g, '-') // remove invalid chars
          .replace(/\s+/g, '-') // collapse whitespace and replace by -
          .replace(/-+/g, '-'); // collapse dashes
          
        return str
    }
    // ----------------------
    

    // ----------------------
    var collection = $(".tinymce");
    collection.each(function() {
        
        var textarea = $(this);
        var txt = textarea.val();
        textarea.val(txt.replace(/<\s\?/gi, "\&lt;?"));
        var txt2 = textarea.val();
        textarea.val(txt2.replace(/\?\s\&gt;/gi, "?\&gt;"));
        
        
    });
    
    $("#q_date_creation_start").parent('.input-group').css('width','100px');
    $("#q_date_creation_end").parent('.input-group').css('width','100px');
    $("#q_date_creation_start").parent('.input-group').css('display','inline-block');
    $("#q_date_creation_end").parent('.input-group').css('display','inline-block');
    
    $('td.tb-level-0').closest('tr').attr('class','tr-level-0');
    $('td.tb-level-1').closest('tr').attr('class','tr-level-1');
    $('td.tb-level-2').closest('tr').attr('class','tr-level-2');
    $('td.tb-level-3').closest('tr').attr('class','tr-level-3');

    $( "#is-groupe-in, #is-groupe-out" ).sortable({

        connectWith: ".connectedSortable"
        
    }).disableSelection();
    
    var valFormatStart = $("#modifier_models_format").val();
    if (valFormatStart == "texte") {
            
        $("#box-article-tiny").fadeOut();
        $("#box-article-normal").fadeIn();
        
    }
    if (valFormatStart == "html") {
        
        $("#box-article-tiny").fadeIn();
        $("#box-article-normal").fadeOut();
        
    }

    $("#emailingmodele_edit_format").change(function() {

        var valFormat = $(this).val();
        if (valFormat == "txt") {
            
            $("#box-article-tiny").fadeOut();
            $("#box-article-normal").fadeIn();
            
        }
        if (valFormat == "html") {
            
            $("#box-article-tiny").fadeIn();
            $("#box-article-normal").fadeOut();
            
        }
    });
    var allIntInput = $('.is-float-input');
    $.each(allIntInput,function (index,value){
        $(value).val($(value).val().replace(/\./, ','))
    });

    $('.is-float-input').keyup(function() {
        $(this).val($(this).val().replace(/\./, ','));
        $(this).val($(this).val().replace(/[^-?\d*\,?\d*$]/, ''));
        if ($(this).val().length == 0) {
            $(this).val('');
        }
    });

    $('.is-digit-input').keyup(function() {
        $(this).val($(this).val().replace(/[^\d)]/, ''));
        if ($(this).val().length > 1 && $(this).val().slice(0,1) == 0) {
            $(this).val($(this).val().replace('0', ''));
        }
        if ($(this).val().length == 0) {
            $(this).val('0');
        }
    });


    function inputNameFunc() { 
        
        var allInputCrypt = $('.input-crypt');
        $.each(allInputCrypt,function (index,value){
            var inputName = value.name;
            var inputCopyName = inputName.replace('_crypt','');

            var inputValue = $('#' + inputName).val();
            $('#' + inputCopyName).val(inputValue);
        });

        // var inputCopyName = inputName.replace('_crypt',''); 
        // $('#' + inputCopyName).val($('#' + inputName)[0].value); 
    };

    
    //inputNameFunc();

    // ----------------
    // Usage : 
    // <form>
    //     <input type="file" />
    //     <div id="show-img-uploaded-filename"></div>
    //     <div id="show-img-uploaded"></div>
    // </form>

    // $('body').on('click','[class*=" remove-img-"]',function(){
    //     var removedId = $(this).attr('class').replace('btn no-loader btn-danger pull-right remove-img-','');
    //     $('.moduleonepage_edit_backimage_' + removedId).val('');
    //     $('.edit-image-moduleonepage_edit_backimage_' + removedId).hide();
    //     $(this).hide();
    // });

    $('body').on('click','.remove-img-ajax',function(){
        var divToRemove = $(this);
        divToRemove.next('img').hide();
        divToRemove.parent('div').parent('div').parent('div').find('input[type=hidden]').val('');
        $(this).closest('div').hide();
    });

    $('body').on('click','.remove-file-ajax',function(){
        var divToRemove = $(this);
        divToRemove.next('img').hide();
        divToRemove.parent('div').parent('div').parent('div').find('input[type=hidden]').val('');
        $(this).closest('div').hide();
    });

    // Sortable Module gallery image
    var urlToFileMiddleTemp = BASE_URL + 'data/temp/';
    var urlToFileMiddle = BASE_URL + 'data/' + CURRENT_CONTROLLER+ '/';
    
    function doSortableGalleryImage() {
        var galleryInputHiddenValue = "";
        $( "#sortable-gallery-image li" ).each(function() {
            var filename = $(this).find('img').attr( "src");
            var finalFilename = filename.replace(urlToFileMiddleTemp,"").replace(urlToFileMiddle,"");
            galleryInputHiddenValue += filename.replace(urlToFileMiddleTemp,'').replace(urlToFileMiddle,'') + ';';
        }); 

        $("input[type=hidden]#moduleshop_edit_image_gallery").val(galleryInputHiddenValue);
        $("input[type=hidden]#moduleblog_edit_image_gallery").val(galleryInputHiddenValue);
        $("input[type=hidden]#modulenews_edit_image_gallery").val(galleryInputHiddenValue);
        $("input[type=hidden]#modulesharedlinks_edit_image_gallery").val(galleryInputHiddenValue);
        $("input[type=hidden]#modulevideo_edit_image_gallery").val(galleryInputHiddenValue);
        $("input[type=hidden]#moduleimage_edit_image_gallery").val(galleryInputHiddenValue);

        $("input[type=hidden]#moduleshop_add_image_gallery").val(galleryInputHiddenValue);
        $("input[type=hidden]#moduleblog_add_image_gallery").val(galleryInputHiddenValue);
        $("input[type=hidden]#modulesharedlinks_add_image_gallery").val(galleryInputHiddenValue);
        $("input[type=hidden]#modulenews_add_image_gallery").val(galleryInputHiddenValue);
        $("input[type=hidden]#modulevideo_add_image_gallery").val(galleryInputHiddenValue);
        $("input[type=hidden]#moduleimage_add_image_gallery").val(galleryInputHiddenValue);

    }

    $( "#sortable-gallery-image" ).sortable({
        update: function(event,ui) {
            doSortableGalleryImage()
        }
    });
    $( "#sortable-gallery-image" ).disableSelection();
    $( "#sortable-gallery-image" ).mouseout(function() { doSortableGalleryImage(); });

    function removeImageContainer(elmt,id,path) {

        $('.' + elmt).fadeOut('slow/400/fast', function() {
            $(this).remove();
        });

        var oldVal = $("input[type=hidden]#" + id).val();
        var newVal = oldVal.replace(path +';', "");
        $("input[type=hidden]#" + id).val(newVal);

    }

    /* Checkout */
    $('.login-register-label').on('click',function(){
        $('.login-register-label').css('background-color','#FFFFFF');
        $('.login-register-label').css('color','#DDDDDD');
        $(this).css('background-color','#F1F1F1F1');
        $(this).css('color','#000000');
    });

    $('.login-not-member').on('click',function (){
        $('.colRegisterPassword').hide();
        $('.colRegisterEmail').removeClass('col-md-6');
        $('.colRegisterEmail').addClass('col-md-12');
        $('#registerType').val('not-member');
    });
    $('.login-new-member').on('click',function (){
        $('.colRegisterPassword').show();
        $('.colRegisterEmail').removeClass('col-md-12');
        $('.colRegisterEmail').addClass('col-md-6');
        $('#registerType').val('new-member');
    });

     // resize input date picker

    $(".doorGets-date-input").parent('div').css("width", "40%").css("display", "inline-block").css("margin-right", "5px");

    function removeTags() {
        var closeTags = $('.remove-tag-btn');
        $.each(closeTags,function(index,el){
            var fieldTag = $(el);
            fieldTag.on('click',function(){
                if ($(this).closest('div').attr('id')) {
                    var parentDiv = $(this).closest('div').attr('id').replace('input-tags-','');
                    var textToRemove = $.trim($(this).closest('span').text());
                    var currentText = $('#'+parentDiv).val().replace(textToRemove+',','');
                    $('#'+parentDiv).val(currentText);
                    $(this).closest('span').remove();
                    // console.log(parentDiv);
                    // console.log(textToRemove);                    
                }
            })
        });        
    }

    var inputTags = $('.input-add-tags');
    $.each(inputTags,function(index,el){
        var inputTag = $(el);
        inputTag.on('keypress',function(e){
            var nameInput = inputTag.attr('id').replace('-tags','');
            if(e.which == 13) {
                e.preventDefault();
                var newTag = $.trim($(inputTag).val());
                if (newTag !== '') {
                    $('#'+nameInput).val($('#'+nameInput).val() + newTag + ',');
                    var newValueToLoad = '<span class="input-tags-field">'+newTag+' <i class="fa fa-remove red-c remove-tag-btn "></i></span>';
                    $('#input-tags-'+nameInput).append(newValueToLoad);
                }
                inputTag.val('');  
                removeTags();
            }
        });

        inputTag.on('blur',function(e){
            var nameInput = inputTag.attr('id').replace('-tags','');
            var newTag = $.trim($(inputTag).val());
            if (newTag !== '') {
                $('#'+nameInput).val($('#'+nameInput).val() + newTag + ',');
                var newValueToLoad = '<span class="input-tags-field">'+newTag+' <i class="fa fa-remove red-c remove-tag-btn "></i></span>';
                $('#input-tags-'+nameInput).append(newValueToLoad);
            } 
            inputTag.val('');
            removeTags();
        })
    });
    
    
    removeTags();
    
});   

function RoxyFileBrowser(field_name, url, type, win) {
        var cmsURL = BASE_URL+'fileman/index.php'; // script URL - use an absolute path!
        if (cmsURL.indexOf("?") < 0) {
            cmsURL = cmsURL + "?type=" + type;
        }
        else {
            cmsURL = cmsURL + "&type=" + type;
        }
        cmsURL += '&input=' + field_name + '&value=' + win.document.getElementById(field_name).value;
        tinyMCE.activeEditor.windowManager.open({
            file: cmsURL,
            title: 'Roxy File Browser',
            width: 850, 
            height: 650,
            resizable: "yes",
            plugins: "media",
            inline: "yes", 
            close_previous: "no"
        }, {
        window: win,
            input: field_name
        });
        return false;
    }

    

    var lengthFilesToUpload = $('.container-ajax-file-').length;
    
    function isUploadedInput(id) {
        $('#' + id).on('change',sendFile);
    }
    function isUploadedDownloadInput(id) {
        $('#' + id).on('change',sendDownloadFile);
    }
    function isUploadedInput(id) {
        $('#' + id).on('change',sendFile);
    }
    function isUploadedOnepageInput(id) {
        $('#' + id).on('change',sendOnepageFile);
    }
    function isUploadedCarouselInput(id) {
        $('#' + id).on('change',sendCarouselFile);
    }

    function isUploadedFacebookInput(id) {
        $('#' + id).on('change',sendMetaFacebookFile);
    }

    function isUploadedTwitterInput(id) {
        $('#' + id).on('change',sendMetaTwitterFile);
    }

    function isUploadedMultiInput(id) {
        $('#' + id).on('change', sendMultiFile);
    }

    function getImageUploaded(path,id) {
        return '<div style="border: solid 1px #ccc;padding:0;border-radius:4px;"><i class="fa fa-times fa-lg pull-right remove-img-ajax red-c"></i><img style="width:100%;" src="' + path +'" /></div>';
    }

    function getLinkUploadedDownload(path) {
        return '<div style="border: solid 1px #ccc;padding:5px 8px;border-radius:0px;"><i class="fa fa-check fa-lg green-c"></i> <a href="'+path+'" target="blank">'+path+'</a> <i class="fa fa-times fa-lg pull-right remove-file-ajax red-c"></i></div>';
    }

    function getImageUploadedMultiple(path,id,realPath) {
        
        lengthFilesToUpload++;

        var inputOut = '<li class="ui-state-default col-md-3 container-ajax-file-' + id + '-' + lengthFilesToUpload + '" ><div style="border: solid 1px #ccc;padding:0;border-radius:4px;"><b class="glyphicon glyphicon-remove red pull-right " ';
        inputOut += ' onclick="removeImageContainer(';
        inputOut += "'container-ajax-file-" + id + "-" + lengthFilesToUpload + "',";
        inputOut += "'" + id + "',";
        inputOut += "'" + realPath + "'";
        inputOut += ')" ></b><img style="width:100%;" src="' + path +'" /></div>';
        inputOut += '';
        inputOut += '</li>';
        
        return inputOut;
    }

    function setInputError (id){
        //$('#' + id).replaceWith($('#' + id).clone());
        $('.upload-recepetion-' + id).html('');
        $('#span-upload-recepetion-' + id).html('');
        $('#label-upload-recepetion-' + id).addClass('error');
    }

    function setMultiInputError (id){
        //$('#' + id).replaceWith($('#' + id).clone());
        $('#label-upload-recepetion-' + id).addClass('error');
    }

    function clearInputError (id){
        
        $('#label-upload-recepetion-' + id).removeClass('error');
    }


    function sendFile(event) {
        var id_file = this.id;
        $('#span-upload-recepetion-' + id_file).html('<img src="'+ SPIN_URL +'" />');
        clearInputError(id_file);

        var data = new FormData();
        $.each(event.target.files, function(key, value)
        {
            data.append(key, value);
        });

        $.ajax({
            url: BASE_URL + 'ajax/?controller=upload&action=uploadImage&uri=' + CURRENT_CONTROLLER,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data, textStatus, jqXHR)
            {
                
                if(typeof data.error === 'undefined')
                {
                    
                    var newImagePath = BASE_URL + 'data/temp/' + data.data.path;
                    if (typeof data.data.path !== 'undefined') {

                        $('.edit-image-' + CURRENT_CONTROLLER).hide();
                        $("input[type=hidden]#" + id_file).val(data.data.path);
                        $('.upload-recepetion-' + id_file).html(getImageUploaded(newImagePath,id_file));
                        $('#span-upload-recepetion-' + id_file).html('');
                        $('#'+id_file).val('');
                    } else {
                       
                        setInputError(id_file);
                    }
                    
                }
                else
                {
                    
                    setInputError(id_file);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                
                setInputError(id_file);
                
            }
        });
    }

    function sendDownloadFile(event) {
        var id_file = this.id;
        $('#span-upload-recepetion-' + id_file).html(' <img src="'+ SPIN_URL +'" />');
        clearInputError(id_file);

        var data = new FormData();
        $.each(event.target.files, function(key, value)
        {
            data.append(key, value);
        });

        $.ajax({
            url: BASE_URL + 'ajax/?controller=download&action=upload&uri=' + CURRENT_CONTROLLER,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data, textStatus, jqXHR) {
                if(typeof data.error === 'undefined') {
                    var newFilePath = BASE_URL + 'data/_download/'+CURRENT_CONTROLLER+'/' + data.data.path;
                    if (typeof data.data.path !== 'undefined') {
                        // console.log(id_file);
                        $('.edit-file-' + CURRENT_CONTROLLER).hide();
                        $("input[type=hidden]#" + id_file).val(data.data.id_file);
                        $('.upload-recepetion-' + id_file).html(getLinkUploadedDownload(newFilePath));
                        $('#span-upload-recepetion-' + id_file).html('');
                        $('#'+id_file).val('');
                    } else {
                        setInputError(id_file);
                    }
                } else {
                    setInputError(id_file);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                setInputError(id_file);
            }
        });
    }

    function sendOnepageFile(event) {

        var id_file = this.id;
        
        $('#span-upload-recepetion-' + id_file).html('<img src="'+ SPIN_URL +'" />');
        clearInputError(id_file);

        var data = new FormData();
        $.each(event.target.files, function(key, value)
        {
            data.append(key, value);
        });

        $.ajax({
            url: BASE_URL + 'ajax/?controller=upload&action=uploadImage&uri=' + CURRENT_CONTROLLER,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data, textStatus, jqXHR)
            {
                
                if(typeof data.error === 'undefined')
                {
                    
                    var newImagePath = BASE_URL + 'data/temp/' + data.data.path;
                    if (typeof data.data.path !== 'undefined') {

                        $('.edit-image-' + id_file).hide();
                        $("input[type=hidden]#" + id_file).val(data.data.path);
                        $('.upload-recepetion-' + id_file).html(getImageUploaded(newImagePath));
                        $('#span-upload-recepetion-' + id_file).html('');
                        $('#'+id_file).val('');
                    } else {
                       
                        setInputError(id_file);
                    }
                    
                }
                else
                {
                    
                    setInputError(id_file);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                
                setInputError(id_file);
                
            }
        });

        
    }

    function sendCarouselFile(event) {

        var id_file = this.id;
        
        $('#span-upload-recepetion-' + id_file).html('<img src="'+ SPIN_URL +'" />');
        clearInputError(id_file);

        var data = new FormData();
        $.each(event.target.files, function(key, value)
        {
            data.append(key, value);
        });
        // console.log(data);
        $.ajax({
            url: BASE_URL + 'ajax/?controller=upload&action=uploadImage&uri=' + CURRENT_CONTROLLER,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data, textStatus, jqXHR)
            {
                
                if(typeof data.error === 'undefined')
                {
                    
                    var newImagePath = BASE_URL + 'data/temp/' + data.data.path;
                    if (typeof data.data.path !== 'undefined') {

                        $('.edit-image-' + id_file).hide();
                        $("input[type=hidden]#" + id_file).val(data.data.path);
                        $('.upload-recepetion-' + id_file).html(getImageUploaded(newImagePath));
                        $('#span-upload-recepetion-' + id_file).html('');
                        $('#'+id_file).val('');
                    } else {
                       
                        setInputError(id_file);
                    }
                    
                }
                else
                {
                    
                    setInputError(id_file);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                
                setInputError(id_file);
                
            }
        });

        
    }

    function sendMetaFacebookFile(event) {
        var id_facebook_file = this.id;
        
        $('#span-upload-recepetion-' + id_facebook_file).html('<img src="'+ SPIN_URL +'" />');
        clearInputError(id_facebook_file);

        var data = new FormData();
        $.each(event.target.files, function(key, value)
        {
            data.append(key, value);
        });

        $.ajax({
            url: BASE_URL + 'ajax/?controller=upload&action=uploadImage&uri=' + CURRENT_CONTROLLER,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data, textStatus, jqXHR)
            {
                
                if(typeof data.error === 'undefined')
                {
                    
                    var newImagePath = BASE_URL + 'data/temp/' + data.data.path;
                    if (typeof data.data.path !== 'undefined') {

                        $('.edit-image-facebook-' + CURRENT_CONTROLLER).hide();
                        $("input[type=hidden]#" + id_facebook_file).val(data.data.path);
                        $('.upload-recepetion-' + id_facebook_file).html(getImageUploaded(newImagePath));
                        $('#span-upload-recepetion-' + id_facebook_file).html('');
                        $('#'+id_facebook_file).val('');
                    } else {
                       
                        setInputError(id_facebook_file);
                    }
                    
                }
                else
                {
                    
                    setInputError(id_facebook_file);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                
                setInputError(id_facebook_file);
                
            }
        });

        
    }

    function sendMetaTwitterFile(event) {
        var id_twitter_file = this.id;
        
        $('#span-upload-recepetion-' + id_twitter_file).html('<img src="'+ SPIN_URL +'" />');
        clearInputError(id_twitter_file);

        var data = new FormData();
        $.each(event.target.files, function(key, value)
        {
            data.append(key, value);
        });

        $.ajax({
            url: BASE_URL + 'ajax/?controller=upload&action=uploadImage&uri=' + CURRENT_CONTROLLER,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data, textStatus, jqXHR)
            {
                
                if(typeof data.error === 'undefined')
                {
                    
                    var newImagePath = BASE_URL + 'data/temp/' + data.data.path;
                    if (typeof data.data.path !== 'undefined') {

                        $('.edit-image-twitter-' + CURRENT_CONTROLLER).hide();
                        $("input[type=hidden]#" + id_twitter_file).val(data.data.path);
                        $('.upload-recepetion-' + id_twitter_file).html(getImageUploaded(newImagePath));
                        $('#span-upload-recepetion-' + id_twitter_file).html('');
                        $('#'+id_twitter_file).val('');
                    } else {
                       
                        setInputError(id_twitter_file);
                    }
                    
                }
                else
                {
                    
                    setInputError(id_twitter_file);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                
                setInputError(id_twitter_file);
                
            }
        });

        
    }



    function sendMultiFile(event) {

        var id_multi_file = this.id;
        
        $('#span-upload-recepetion-' + id_multi_file).html('<div src="'+ SPIN_URL +'" /></div>');
        clearInputError(id_multi_file);

        var data = new FormData();
        $.each(event.target.files, function(key, value)
        {
            data.append(key, value);
        });

        $.ajax({
            url: BASE_URL + 'ajax/?controller=upload&action=uploadImage&uri=' + CURRENT_CONTROLLER ,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data, textStatus, jqXHR)
            {
                
                if(typeof data.error === 'undefined')
                {
                    
                    var newImagePath = BASE_URL + 'data/temp/' + data.data.path;
                    if (typeof data.data.path !== 'undefined') {

                        var oldVal = $("input[type=hidden]#" + id_multi_file).val();
                        $("input[type=hidden]#" + id_multi_file).val(oldVal + data.data.path + ';');
                        $('ul#sortable-gallery-image').append(getImageUploadedMultiple(newImagePath,id_multi_file,data.data.path));
                        $('#span-upload-recepetion-' + id_multi_file).html('');
                        $('#'+id_multi_file).val('');
                    } else {
                        setMultiInputError(id_multi_file);
                    }
                    
                }
                else
                {
                    setMultiInputError(id_multi_file);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                setMultiInputError(id_multi_file);
                
            }
        });

        
    }

    function sendFormWidget(uri) {
        
        var data = new FormData();
        
        $.ajax({
            url: BASE_URL + 'ajax/?controller=form&action=send&uri=' + uri ,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data, textStatus, jqXHR)
            {
                
                
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                
                
            }
        });
    }


    isUploadedInput("moduleshop_add_image");
    isUploadedInput("moduleshop_edit_image");
    isUploadedInput("moduleblog_add_image");
    isUploadedInput("moduleblog_edit_image");
    isUploadedInput("modulepartner_edit_image");
    isUploadedInput("modulepartner_add_image");

    isUploadedOnepageInput("moduleonepage_edit_backimage_1");
    isUploadedOnepageInput("moduleonepage_edit_backimage_2");
    isUploadedOnepageInput("moduleonepage_edit_backimage_3");
    isUploadedOnepageInput("moduleonepage_edit_backimage_4");
    isUploadedOnepageInput("moduleonepage_edit_backimage_5");
    
    isUploadedFacebookInput("moduleshop_add_meta_facebook_image");
    isUploadedTwitterInput("moduleshop_add_meta_twitter_image");
    isUploadedFacebookInput("moduleshop_edit_meta_facebook_image");
    isUploadedTwitterInput("moduleshop_edit_meta_twitter_image");

    isUploadedFacebookInput("moduleblog_add_meta_facebook_image");
    isUploadedTwitterInput("moduleblog_add_meta_twitter_image");
    isUploadedFacebookInput("moduleblog_edit_meta_facebook_image");
    isUploadedTwitterInput("moduleblog_edit_meta_twitter_image");

    isUploadedFacebookInput("modulenews_add_meta_facebook_image");
    isUploadedTwitterInput("modulenews_add_meta_twitter_image");
    isUploadedFacebookInput("modulenews_edit_meta_facebook_image");
    isUploadedTwitterInput("modulenews_edit_meta_twitter_image");

    isUploadedFacebookInput("modulesharedlinks_add_meta_facebook_image");
    isUploadedTwitterInput("modulesharedlinks_add_meta_twitter_image");
    isUploadedFacebookInput("modulesharedlinks_edit_meta_facebook_image");
    isUploadedTwitterInput("modulesharedlinks_edit_meta_twitter_image");

    isUploadedFacebookInput("modulevideo_add_meta_facebook_image");
    isUploadedTwitterInput("modulevideo_add_meta_twitter_image");
    isUploadedFacebookInput("modulevideo_edit_meta_facebook_image");
    isUploadedTwitterInput("modulevideo_edit_meta_twitter_image");

    isUploadedFacebookInput("moduleimage_add_meta_facebook_image");
    isUploadedTwitterInput("moduleimage_add_meta_twitter_image");
    isUploadedFacebookInput("moduleimage_edit_meta_facebook_image");
    isUploadedTwitterInput("moduleimage_edit_meta_twitter_image");

    isUploadedFacebookInput("modulemultipage_add_meta_facebook_image");
    isUploadedTwitterInput("modulemultipage_add_meta_twitter_image");
    isUploadedFacebookInput("modulemultipage_edit_meta_facebook_image");
    isUploadedTwitterInput("modulemultipage_edit_meta_twitter_image");

    isUploadedFacebookInput("modulepage_edit_meta_facebook_image");
    isUploadedTwitterInput("modulepage_edit_meta_twitter_image");
    
    isUploadedFacebookInput("modules_addmultipage_meta_facebook_image");
    isUploadedTwitterInput("modules_addmultipage_meta_twitter_image");
    isUploadedFacebookInput("modules_editmultipage_meta_facebook_image");
    isUploadedTwitterInput("modules_editmultipage_meta_twitter_image");

    isUploadedFacebookInput("modules_addpage_meta_facebook_image");
    isUploadedTwitterInput("modules_addpage_meta_twitter_image");
    isUploadedFacebookInput("modules_editpage_meta_facebook_image");
    isUploadedTwitterInput("modules_editpage_meta_twitter_image");

    isUploadedFacebookInput("modules_addvideo_meta_facebook_image");
    isUploadedTwitterInput("modules_addvideo_meta_twitter_image");
    isUploadedFacebookInput("modules_editvideo_meta_facebook_image");
    isUploadedTwitterInput("modules_editvideo_meta_twitter_image");

    isUploadedFacebookInput("modules_addimage_meta_facebook_image");
    isUploadedTwitterInput("modules_addimage_meta_twitter_image");
    isUploadedFacebookInput("modules_editimage_meta_facebook_image");
    isUploadedTwitterInput("modules_editimage_meta_twitter_image");

    isUploadedFacebookInput("modules_addnews_meta_facebook_image");
    isUploadedTwitterInput("modules_addnews_meta_twitter_image");
    isUploadedFacebookInput("modules_editnews_meta_facebook_image");
    isUploadedTwitterInput("modules_editnews_meta_twitter_image");

    isUploadedFacebookInput("modules_addshop_meta_facebook_image");
    isUploadedTwitterInput("modules_addshop_meta_twitter_image");
    isUploadedFacebookInput("modules_editshop_meta_facebook_image");
    isUploadedTwitterInput("modules_editshop_meta_twitter_image");

    isUploadedFacebookInput("modules_addblog_meta_facebook_image");
    isUploadedTwitterInput("modules_addblog_meta_twitter_image");
    isUploadedFacebookInput("modules_editblog_meta_facebook_image");
    isUploadedTwitterInput("modules_editblog_meta_twitter_image");

    // isUploadedInput("moduleblog_add_image_gallery");

    isUploadedMultiInput("moduleshop_edit_image_gallery");
    isUploadedMultiInput("moduleblog_edit_image_gallery");
    isUploadedMultiInput("modulenews_edit_image_gallery");
    isUploadedMultiInput("modulesharedlinks_edit_image_gallery");
    isUploadedMultiInput("modulevideo_edit_image_gallery");
    isUploadedMultiInput("moduleimage_edit_image_gallery");

    isUploadedMultiInput("moduleshop_add_image_gallery");
    isUploadedMultiInput("moduleblog_add_image_gallery");
    isUploadedMultiInput("modulenews_add_image_gallery");
    isUploadedMultiInput("modulesharedlinks_add_image_gallery");
    isUploadedMultiInput("modulevideo_add_image_gallery");
    isUploadedMultiInput("moduleimage_add_image_gallery");
    


    



