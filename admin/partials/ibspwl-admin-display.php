<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.barbareshet.co.il
 * @since      1.0.0
 *
 * @package    Ibspwl
 * @subpackage Ibspwl/admin/partials
 */

if ( ! defined( 'WPINC' ) ) die;
if ( !current_user_can( 'manage_options' ) )  {
	wp_die( _e( 'You do not have sufficient permissions to access this page.' ) );
}
$ptl_args = array(
	'public'   => true,
	'_builtin' => false
);

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h2><?php _e('Posts Wishlist Options', $this->plugin_name); ?></h2>
    <form method="post" action="options.php">
		<?php
		//Grab all options
		$options = get_option($this->plugin_name);

		$add_to_wl_icon =   ( isset( $options['add_to_wl_icon'] )   && ! empty( $options['add_to_wl_icon'] ) )  ? esc_attr( $options['add_to_wl_icon'] ) : 'Heart';
		$wl_icon =          ( isset( $options['wl_icon'] )          && ! empty( $options['wl_icon'] ) )         ? esc_attr( $options['wl_icon'] ) : 'Star';
		$wl_post_type =     ( isset( $options['wl_post_type'] )     && ! empty( $options['wl_post_type'] ) )    ? esc_attr( $options['wl_post_type'] ) : '1';


		settings_fields($this->plugin_name);
		do_settings_sections($this->plugin_name);

		?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="add_to_wl_icon">
			                <?php _e( 'Set Add To Wish list Icon:', $this->plugin_name ); ?>
                        </label>
                    </th>
                    <td>
                        <select name="<?php echo $this->plugin_name; ?>[add_to_wl_icon]" id="<?php echo $this->plugin_name; ?>-add_to_wl_icon" class="regular-text">
                            <option <?php if ( $add_to_wl_icon == 'heart' ) echo 'selected="selected"'; ?> value="heart">&#xf004 Heart</option>
                            <option <?php if ( $add_to_wl_icon == 'smile' ) echo 'selected="selected"'; ?> value="smile">&#xf584 Smile</option>
                            <option <?php if ( $add_to_wl_icon == 'thumbs-up' ) echo 'selected="selected"'; ?> value="thumbs-up">&#xf164 Like</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wl_icon">
	                        <?php _e( 'Set Wish list Icon:', $this->plugin_name ); ?>
                        </label>
                    </th>
                    <td>
                        <select name="<?php echo $this->plugin_name; ?>[wl_icon]" id="<?php echo $this->plugin_name; ?>-wl_icon" class="regular-text">
                            <option <?php if ( $wl_icon == 'star' ) echo 'selected="selected"'; ?> value="star">&#xf004 Star</option>
                            <option <?php if ( $wl_icon == 'list' ) echo 'selected="selected"'; ?> value="smile">&#xf0ca List</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wl_post_type">
			                <?php _e( 'Set Wish list Post Type:', $this->plugin_name ); ?>
                        </label>
                    </th>
                    <td>
                    <?php foreach ( get_post_types( $ptl_args, 'names' ,'and') as $post_type ) {?>


                        <p class="description">
		                    <?php echo $post_type ;?>
                            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-wl_post_type[]" name="<?php echo $this->plugin_name; ?>[wl_post_type]" value="1" <?php checked( $wl_post_type, 0 ); ?> />
                        </p>


                    <?php } ?>
                    </td>
                </tr>
            </tbody>

        </table>
        <!-- Select -->

		<?php submit_button( __( 'Save all changes', $this->plugin_name ), 'primary','submit', TRUE ); ?>
    </form>


</div>