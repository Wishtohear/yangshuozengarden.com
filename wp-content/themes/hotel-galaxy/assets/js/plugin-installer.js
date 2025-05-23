jQuery('.activate-now').live('DOMNodeInserted', function () {
    var activateButton = jQuery('.activate-now');
    if (activateButton.length) {
        var url = jQuery(activateButton).attr('href');
        if (typeof url !== 'undefined') {
            //Request plugin activation.
            jQuery.ajax({
                beforeSend: function () {
                    jQuery(activateButton).replaceWith('<a class="button updating-message">' + myplugin.activating + '...</a>');
                },
                async: true,
                type: 'GET',
                url: url,
                success: function () {
                    //Reload the page.
                    location.reload();
                }
            });
        }
    }
});

jQuery(document).ready(function ($) {    

    $('.activate-now').on('click', function (e) {
        var activateButton = $(this);
        e.preventDefault();
        if ($(activateButton).length) {
            var url = $(activateButton).attr('href');
            
            if (typeof url !== 'undefined') {
                //Request plugin activation.
                $.ajax({
                    beforeSend: function () {
                        $(activateButton).replaceWith('<a class="button updating-message">' + myplugin.activating + '...</a>');
                    },
                    async: true,
                    type: 'GET',
                    url: url,
                    success: function () {
                        //Reload the page.
                        location.reload();
                    },
                    error: function(xhr,status,error){
                        console.log(error);
                    }
                });
            }
        }
    });
});