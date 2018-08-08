(function( $ ) {


	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	console.log('ibspwl js file');
    var wishlist = $('#wl-images');
    var wl_array = [];
    var ajax_add_to_wishlist = $('.ajax_add_to_wishlist'),
    	heart	= $('.fa-heart'),
    	thumbs	= $('.fa-thumbs-up'),
    	smile	= $('.fa-grin-hearts'),
		star	= $('.fa-star'),
    	list	= $('.fa-list-ul');
    $(ajax_add_to_wishlist).bind('click', function ( event ) {
        event.preventDefault();
		console.log(ajax_add_to_wishlist + 'clicked');
		// set default variable
        var pID = $(this).data('post_id');
		// $(this).removeClass('ajax_add_to_wishlist').addClass('ajax_remove_from_wishlist');
		// set the cookie array
        var cookieArray = getCookie('wishlist_posts');
        if (!cookieArray) cookieArray = [];
        else {
            cookieArray = cookieArray.split(',');
        }
        if ($(this).find('.fa-heart').hasClass('far')) {
            $(this).find('.fa-heart').addClass('fas in_wishlist').removeClass('far').css('color', 'red');
            $(this).attr('data-value', 1);
            var wl_form = {
                action		: 'ibspwl_ajax_wishlist',
                post_id		: pID,
                post_title	: $(this).attr('data-title'),
                in_fav		: $(this).attr('data-value'),
                post_img	: $(this).attr('data-img') ? $(this).attr('data-img') : 'http://via.placeholder.com/100x100',
            };
            $.post( wp_ajax_wishlist.ajax_url, wl_form, function ( data ) {

            });
            cookieArray.push(pID);
            setCookie( 'wishlist_posts', cookieArray );
            console.log('cookies array: ' + cookieArray);
            //add to wishlist
            $(wishlist).append('<li class="m-1 wishlist-item" id="wl-item-'+pID+'">'
                +'<img src="'+wl_form.post_img+'" width="100" height="100" alt="" class="img-responsive">'
                +'<p>'+wl_form.post_title+'</p>'
                +'<input type="hidden" id="wl_img_'+pID+'" value="'+wl_form.post_img+'" data-post-id="'+pID+'" data-title="'+wl_form.post_title+'">'
                +'</li>');

            //change wishlist display
            if ( $(wl_array.length > 0) ){
                $('#wishListTrigger').find('.fa-star').addClass('fas').removeClass('far');

            }
    	} else {
            $(this).find('.fa-heart').addClass('far').removeClass('fas in_wishlist').css('color', 'inherit');
            $(this).attr('data-value', 0);
            //remove from wishlist
            $('#wl-item-'+pID+'').remove();

            removeFromArray(cookieArray, pID);

            if ( $(wl_array.length == 0) ){
                $('#wishListTrigger').find('.fa-star').addClass('far').removeClass('fas').removeAttr('data-toggle').removeAttr('data-placement');
            }
            setCookie( 'wishlist_posts', cookieArray );
            console.log('removeFromArray:' + wl_array);
            console.log('post-' + pID + ' removed wish list');
            console.log(cookieArray);
        }

	});
    /**
     * Remove item From wishlist array
     * @param array
     * @param el
     */
    function removeFromArray( array, el) {
        const index = array.indexOf(el);
        array.splice(index, 1)
    }
	//remove from cookie array
    function wl_remove_from_form(){
        $('.remove_from_wl').bind('click',function () {
            $(this).parent().remove();
            $('.post-'+pID).find('.fa-heart').addClass('far').removeClass('fas tg-wl').css('color', '#fff');
            removeFromArray(wl_array, pID);
            console.log('wl_remove_from_form:'+wl_array);
        })
    }

    //Cookie handlers
    function setCookie(key, value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value +';path=/'+';expires=' + expires.toUTCString();
    }


    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

})( jQuery );
