<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 8/8/2018
 * Time: 07:57 AM
 */
global $post;
$bg_img = '';
?>
<a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $post->ID ) );?>" rel="nofollow" data-post_id="<?php the_ID(); ?>" data-value="0" data-img="<?php echo $bg_img;?>" class="ajax_add_to_wishlist">
	<i class="fas fa-heart" aria-hidden="true"></i>
</a>
