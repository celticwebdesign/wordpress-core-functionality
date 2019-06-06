<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://fastnetmarketing.co.uk/
 * @since      1.0.0
 *
 * @package    Fastnetmarketing_Admin
 * @subpackage Fastnetmarketing_Admin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Fastnetmarketing_Admin
 * @subpackage Fastnetmarketing_Admin/includes
 * @author     Darren Stevens <darren@fastnetmarketing.co.uk>
 */
class Fastnetmarketing_Admin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'fastnetmarketing-admin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
