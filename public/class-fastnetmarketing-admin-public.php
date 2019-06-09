<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://fastnetmarketing.co.uk/
 * @since      1.0.0
 *
 * @package    Fastnetmarketing_Admin
 * @subpackage Fastnetmarketing_Admin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Fastnetmarketing_Admin
 * @subpackage Fastnetmarketing_Admin/public
 * @author     Darren Stevens <darren@fastnetmarketing.co.uk>
 */
class Fastnetmarketing_Admin_Public {

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
		 * defined in Fastnetmarketing_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fastnetmarketing_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fastnetmarketing-admin-public.css', array(), $this->version, 'all' );

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
		 * defined in Fastnetmarketing_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fastnetmarketing_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fastnetmarketing-admin-public.js', array( 'jquery' ), $this->version, false );

	}

    // DEVELOPER
    public function developer_box() {

	     if( class_exists('acf') ) {
	        // Will only access if ACF plugin is installed and activated

	        if ( get_field( 'core_functionality__developer_box', 'options' ) == 'true' ) {

	        	wp_enqueue_script( $this->plugin_name.'developer-box', plugin_dir_url( __FILE__ ) . 'js/fastnetmarketing-admin-public-developer-box.js', array( 'jquery' ), $this->version, false );

	        	wp_enqueue_style( $this->plugin_name.'developer-box', plugin_dir_url( __FILE__ ) . 'css/fastnetmarketing-admin-public-developer-box.css', array(), $this->version, 'all' );

		        global $template, $post;
		        $template_array = explode('/', $template);

		        echo '<span class="dev-template-name">

		                WPEngine<br />';
		        echo end($template_array).'<br />';
		        echo 'ID: '.get_the_ID().'<br />
		                <span class="dev-page-width"></span>px width<br />
		                <span class="dev-page-height"></span>px height<br />';

		        if (is_user_logged_in()) {
		            echo 'Logged IN - ';
		            global $current_user;
		            $user = wp_get_current_user();
		            echo $user->display_name."<br />";

		            echo 'Member - ';
		            $user_meta = get_userdata($user->ID);
		            echo implode(', ', $user_meta->roles);
		        } else {
		            echo 'Logged OUT';
		        }

		        echo '</span>';

	        }

	     }

    }

}
