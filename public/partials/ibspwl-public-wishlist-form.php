<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.barbareshet.co.il
 * @since      1.0.0
 *
 * @package    Ibspwl
 * @subpackage Ibspwl/public/partials
 */
$ibspwl_wl_nonce = wp_create_nonce( 'ibspwl_wishlist_form_nonce' );
?>

<div class="ibspwl">

    <form id="ibspwl_form" name="ibspwl_form" class="ibspwl-form" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">

        <input type="hidden" name="action" value="wishlist_form">
        <input type="hidden" name="ibspwl_form_nonce" value="<?php echo $ibspwl_wl_nonce; ?>">

        <div class="row form-row-wrap">
            <div class="col-xs-6 input-wrap">
                <div class="form-group">
                    <label for="wl_from_email">From</label>
                    <input type="wl_from_email" id="wl_from_email" name="wl_from_email" class="form-control" placeholder="add your mail" required="required">
                </div>
                <div class="form-group">
                    <label for="wl_to_email">To</label>
                    <input type="wl_to_email" id="wl_to_email" name="wl_to_email" class="form-control" placeholder="add recipient mail" required="required">
                </div>
                <div class="form-group">
                    <label for="wl_subject">Subject</label>
                    <input type="text" id="wl_subject" name="wl_subject" placeholder="Subject" class="form-control">
                </div>
                <div class="form-group">
                    <label for="wl_message">Message</label>
                    <textarea name="wl_message" id="wl_message" cols="30" rows="10" class="form-control" placeholder="Your Message..."></textarea>
                </div>
                <div class="form-group wl-submit-wrap">
                    <input type="submit" id="wl_submit" name="wl_submit" class="btn btn-dark p-2" value="Send Now">
                </div>
            </div>
            <div class="col-xs-6 wl-img-wrap">
                <ul class="list-unstyled ml-1 d-inline-flex" id="wl-images">

                </ul>
            </div>

        </div>
    </form>

</div>


