<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://fastnetmarketing.co.uk/
 * @since      1.0.0
 *
 * @package    Fastnetmarketing_Admin
 * @subpackage Fastnetmarketing_Admin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fastnetmarketing_Admin
 * @subpackage Fastnetmarketing_Admin/admin
 * @author     Darren Stevens <darren@fastnetmarketing.co.uk>
 */
class Fastnetmarketing_Admin_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fastnetmarketing-admin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fastnetmarketing-admin-admin.js', array( 'jquery' ), $this->version, false );

	}

	// Register ACF theme options from a plugin:
	// https://support.advancedcustomfields.com/forums/topic/cant-register-options-page-from-plugin/
	function acf_init() {

		$page = acf_add_options_page(array(
			'page_title' 	=> 'Core Functionality',
			'menu_title' 	=> 'Core Functionality',
			'menu_slug' 	=> 'theme-general-settings',
			'capability' 	=> 'edit_posts',
			'redirect' 		=> false,
			'parent_slug' 	=> 'options-general.php',
		));

		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array(
				'key' => 'group_5cfcf01f2e74e',
				'title' => 'Core Functionality',
				'fields' => array(
					array(
						'key' => 'field_5cfcf03748512',
						'label' => 'Developer Box',
						'name' => 'core_functionality__developer_box',
						'type' => 'radio',
						'instructions' => 'Show / Do not show, the red developer box.',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'true' => 'Show',
							'false' => 'Do not show',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => 'false',
						'layout' => 'vertical',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'theme-general-settings',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
			));

		endif;

	}

	// https://www.advancedcustomfields.com/resources/local-json/
	// function acf_json_save_json( $path ) {
	    
	//     // update path
	//     // $path = WP_CONTENT_DIR . '/uploads/acf-json';
	//     $path = plugin_dir_path( __FILE__ ) . '/acf-json';
	    
	//     // return
	//     return $path;
	    
	// }

	// https://www.advancedcustomfields.com/resources/local-json/
	// function acf_json_load_json( $paths ) {
	    
	//     // remove original path (optional)
	//     unset($paths[0]);

	//     // append path
	//     // $path = WP_CONTENT_DIR . '/uploads/acf-json';
	//     $path = plugin_dir_path( __FILE__ ) . 'acf-json';

	//     // return
	//     return $paths;
	    
	// }



    // http://www.wpbeginner.com/wp-themes/change-the-footer-in-your-wordpress-admin-panel/
    // Change the Footer in Your WordPress Admin Panel
    public function remove_footer_admin()
    {
        return 'Website by <a href="https://www.fastnetmarketing.co.uk" target="_blank">Fastnet Marketing</a>';
    }

    // http://blog.interruptedreality.com/2011/wordpress-change-admin-footer/
    // WordPress: Remove/Change the Text and Version Number in the Admin Footer
    public function my_footer_version()
    {
        return '';
    }

    /* Enter the full email address you want displayed */
    /* from http://miloguide.com/filter-hooks/wp_mail_from/ */
    // http://premium.wpmudev.org/blog/wordpress-email-settings/
    function send_wp_mail_from($email)
    {
        return "company@email-address.com";
    }
    function send_wp_mail_from_name($email)
    {
        return "Company Name Here";
    }

    function login_url()
    {
        return home_url('/');
    }
    function login_title()
    {
        return get_option('blogname');
    }

    // Admin - remove Posts type and Comments
    // http://wordpress.org/support/topic/remove-pages-and-posts-from-dashboard-menu
    function remove_menus()
    {
        global $menu;
        $restricted = array(__('Comments'),);
        end($menu);
        while (prev($menu)) {
            $value = explode(' ', $menu[key($menu)][0]);
            if (in_array($value[0] != null?$value[0]:"", $restricted)) {
                unset($menu[key($menu)]);
            }
        }
    } // __('Posts'),

}
