<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.barbareshet.co.il
 * @since      1.0.0
 *
 * @package    Ibspwl
 * @subpackage Ibspwl/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ibspwl
 * @subpackage Ibspwl/public
 * @author     Ido Barnea <barbareshet@gmail.com>
 */
class Ibspwl_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ibspwl_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ibspwl_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name.'-bs-4-style', plugin_dir_url( __FILE__ ).'vendor/bootstrap/css/bootstrap.min.css', array(), $this->version, 'all');
		wp_enqueue_style( $this->plugin_name.'-fa-5-style', plugin_dir_url( __FILE__ ).'vendor/fontawesome/css/all.min.css', array(), $this->version, 'all');
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ibspwl-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ibspwl_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ibspwl_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name.'-js-cookie', plugin_dir_url( __FILE__ ) . 'vendor/js-cookie/js-cookie.js', array( 'jquery' ), $this->version, true);
		wp_enqueue_script( $this->plugin_name.'-bs-4-script', plugin_dir_url( __FILE__ ) . 'vendor/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), $this->version, true);
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ibspwl-public.js', array( 'jquery' ), $this->version, false );

	}



	public function wishlist_modal_shortcode($args, $content=""){

		include_once( 'partials/' . $this->plugin_name . '-public-modal.php' );
	}
	public function add_to_wishlist_shortcode($args, $content=""){

		ob_start();
		include_once( 'partials/' . $this->plugin_name . '-public-add-to-wishlist.php' );
		return ob_get_clean();
	}
	public function show_wishlist_shortcode($args, $content=""){
		include_once( 'partials/' . $this->plugin_name . '-public-wishlist-triger.php' );
	}
	public function wishlist_form_shortcode($args, $content=""){
		include_once( 'partials/' . $this->plugin_name . '-public-wishlist-form.php' );
	}
}
