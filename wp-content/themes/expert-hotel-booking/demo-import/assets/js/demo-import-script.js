var Whizzie = (function($){
    var t;
	var current_step = '';
	var step_pointer = '';

    // callbacks from form button clicks.
    var callbacks = {
		do_next_step: function( btn ) {
			do_next_step( btn );
		},
		install_widgets: function( btn ) {
			var widgets = new WidgetManager();
			widgets.init( btn );
		},
        install_content: function(btn){
            var content = new ContentManager();
            content.init( btn );
        }
    };

    function window_loaded() {
		var maxHeight = 0;
		
		$( '.whizzie-menu li.step' ).each( function( index ) {
			$(this).attr( 'data-height', $(this).innerHeight() );
			if( $(this).innerHeight() > maxHeight ) {
				maxHeight = $(this).innerHeight();
			}
		});
		
		$( '.whizzie-menu li .detail' ).each( function( index ) {
			$(this).attr( 'data-height', $(this).innerHeight() );
			$(this).addClass( 'scale-down' );
		});
		

		$( '.whizzie-menu li.step' ).css( 'height', '100%' );
		$( '.whizzie-menu li.step:first-child' ).addClass( 'active-step' );
		$( '.whizzie-nav li:first-child' ).addClass( 'active-step' );
		
		$( '.whizzie-wrap' ).addClass( 'loaded' );
		
        // init button clicks:
        $('.do-it').on( 'click', function(e) {
			e.preventDefault();
			step_pointer = $(this).data('step');
			current_step = $('.step-' + $(this).data('step'));
			$('.whizzie-wrap').addClass( 'spinning' );
            if($(this).data('callback') && typeof callbacks[$(this).data('callback')] != 'undefined'){
                // we have to process a callback before continue with form submission
                callbacks[$(this).data('callback')](this);
                return false;
            } else {
                loading_content();
                return true;
            }
        });
        $('.button-upload').on( 'click', function(e) {
            e.preventDefault();
            renderMediaUploader();
        });
        $('.theme-presets a').on( 'click', function(e) {
            e.preventDefault();
            var $ul = $(this).parents('ul').first();
            $ul.find('.current').removeClass('current');
            var $li = $(this).parents('li').first();
            $li.addClass('current');
            var newcolor = $(this).data('style');
            $('#new_style').val(newcolor);
            return false;
        });
		$( '.more-info' ).on( 'click', function( e ) {
			e.preventDefault();
			var parent = $(this).parent().parent();
			parent.toggleClass( 'show-detail' );
			if( parent.hasClass( 'show-detail' ) ) {
				var detail = parent.find('.detail');
				parent.animate({
					height: parent.data( 'height' ) + detail.data( 'height' )
				},
				500,
				function(){
					detail.toggleClass( 'scale-down' );
				}).css( 'overflow', 'visible' );;
			} else {
				parent.animate({
					height: maxHeight
				},
				500,
				function(){
					detail = parent.find('.detail');
					detail.toggleClass( 'scale-down' );
				}).css( 'overflow', 'visible' );
			}
		});
    }

    function loading_content(){}
	
    function do_next_step( btn ) {
		current_step.removeClass( 'active-step' );
		$( '.nav-step-' + step_pointer ).removeClass( 'active-step' );
		current_step.addClass( 'done-step' );
		$( '.nav-step-' + step_pointer ).addClass( 'done-step' );
		current_step.fadeOut( 500, function() {
			current_step = current_step.next();
			step_pointer = current_step.data( 'step' );
			current_step.fadeIn();
			current_step.addClass( 'active-step' );
			$( '.nav-step-' + step_pointer ).addClass( 'active-step' );
			$('.whizzie-wrap').removeClass( 'spinning' );
		});
    }
	
	function WidgetManager() {
		function import_widgets(){
            jQuery.post(
				whizzie_params.ajaxurl,
				{
					action: 'setup_widgets',
					wpnonce: whizzie_params.wpnonce
				},
				complete
			);
		}
		return {
			init: function( btn ) {
				complete = function() {
					do_next_step();
				}
				import_widgets();
			}
		}
	}

    function ContentManager(){

        var complete;
        var items_completed = 0;
        var current_item = '';
        var $current_node;
        var current_item_hash = '';

        function ajax_callback(response) {
            if(typeof response == 'object' && typeof response.message != 'undefined'){
                $current_node.find('span').text(response.message);
                if(typeof response.url != 'undefined'){
                    // we have an ajax url action to perform.
                    if(response.hash == current_item_hash){
                        $current_node.find('span').text("failed");
                        find_next();
                    }else {
                        current_item_hash = response.hash;
                        jQuery.post(response.url, response, ajax_callback).fail(ajax_callback); // recuurrssionnnnn
                    }
                }else if(typeof response.done != 'undefined'){
                    // finished processing this plugin, move onto next
                    find_next();
                }else{
                    // error processing this plugin
                    find_next();
                }
            }else{
                // error - try again with next plugin
                $current_node.find('span').text("ajax error");
                find_next();
            }
        }

        function process_current(){
            if(current_item){

                var $check = $current_node.find('input:checkbox');
                if($check.is(':checked')) {
                    // process htis one!
                    jQuery.post(whizzie_params.ajaxurl, {
                        action: 'envato_setup_content',
                        wpnonce: whizzie_params.wpnonce,
                        content: current_item
                    }, ajax_callback).fail(ajax_callback);
                }else{
                    $current_node.find('span').text("Skipping");
                    setTimeout(find_next,300);
                }
            }
        }
        
        return {
            init: function(btn){
                $('.envato-setup-pages').addClass('installing');
                $('.envato-setup-pages').find('input').prop("disabled", true);
                complete = function(){
                    loading_content();
                    window.location.href=btn.href;
                };
                find_next();
            }
        }
    }

    return {
        init: function(){
			t = this;
			$(window_loaded);
        },
        callback: function(func){
            console.log(func);
            console.log(this);
        }
    }

})(jQuery);

Whizzie.init();