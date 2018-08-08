<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 8/8/2018
 * Time: 07:57 AM
 */

global $post;
$post_title = get_the_title();

if ( has_post_thumbnail() ) {
	$bg_img = get_the_post_thumbnail_url();
} else {
	$bg_img = 'http://via.placeholder.com/120x120';
}

if ( is_single()){
	$wl_link_wrap_start = '<div class="tg-social__link wl-social__link">';
	$wl_link_wrap_end = '</div>';
} else {
	$wl_link_wrap_start = '<li class="list-inline-item tg-social__link wl-social__link">';
	$wl_link_wrap_end = '</li>';
}



echo $wl_link_wrap_start;?>
<a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $post->ID ) );?>" rel="nofollow" data-post_id="<?php the_ID(); ?>" data-value="0" data-img="<?php echo $bg_img;?>" data-title="<?php echo $post_title;?>" class="ajax_add_to_wishlist">
	<i class="far fa-heart" aria-hidden="true"></i>
</a>
<?php $wl_link_wrap_end;