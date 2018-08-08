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

?>
<div class="modal fade modal-lg" id="tg_wishlist_modal" tabindex="-1" role="dialog" aria-labelledby="tg_wishlist_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light text-primary">
                <div class="container-fluid">
                    <div class="row d-block col-sm-12 text-center">
                        <h3 class="modal-title">Send To Someone</h3>
                        <!-- /.modal-title -->
                    </div>
                    <!-- /.row col-sm-12 modal-title -->
                    <div class="row flex-row" id="wishListFormWrap">
                        <div class="col-sm-12 p-3">
                            <?php echo do_shortcode('[wishlist-form]');?>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


