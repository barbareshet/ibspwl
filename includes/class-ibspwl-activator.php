<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.barbareshet.co.il
 * @since      1.0.0
 *
 * @package    Ibspwl
 * @subpackage Ibspwl/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ibspwl
 * @subpackage Ibspwl/includes
 * @author     Ido Barnea <barbareshet@gmail.com>
 */
class Ibspwl_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		if ( version_compare( get_bloginfo( 'version'), '4.5', '<' ) ){
			wp_die( __( 'You must update WP version to higher than 4.5 in order to use this plugin', 'ibspwl'));
		}

	}

}
