
$(function() {
    if($('#main').find('#page-about')){
        $('#page-about').append("<div id='loading'></div>");
        $.ajaxSetup({
            cache: false,
            beforeSend: function() {$('#loading').show();},
            complete: function() {$('#loading').hide();},
            success: function() {$('#loading').remove();}
        });
        $.ajax({
            url: 'get/partner',
            success: function(data) {
                $('#page-about').append(data);
            },
        });
    }
    $(".buttom-enquire").fancybox({
        'hideOnOverlayClick' : true,
        'autoScale' : false,
        'scrolling' : 'no',
        'titleShow' 	: false,
        //'showCloseButton' : false,
        'showNavArrows' : false,
        'width'	: 795,
        'height' : 320
    });
});

$('#carousel').elastislide({
    minItems	: 8
});

function send_contact_form()
{
    $('span.error-text').hide();
    $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {$('#frm-contact #loading').show();},
            complete: function() {$('#frm-contact #loading').hide();},
            success: function() {$('#frm-contact #loading').hide();}
        });

    $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'contact',
        data: {
            name : $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val()
        },
        success: function(data) {
            if(data && data.error)
            {
                $('span.error-text').hide();
                $.each(data.errors, function(k, v) {
                    $('#' + k + '-error').text(v).show('slow');
                });
            }
            else
            {
                $("#frm-contact").prepend('<div class="message success">'+data.message+'</div>');
                $('#name, #email, #message').val('');
                $("#frm-contact div").hide();
                $("#frm-contact .success").show('slow');
                //setTimeout('window.location.reload()', 10000);
            };
        }
    });
};