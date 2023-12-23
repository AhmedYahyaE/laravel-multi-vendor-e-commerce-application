<?php
namespace ElementorPro\Modules\WpCli;

use Elementor\Core\Base\Module as BaseModule;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Module extends BaseModule {

	/**
	 * Get module name.
	 *
	 * @since  2.1.0
	 * @access public
	 *
	 * @return string Module name.
	 */
	public function get_name() {
		return 'wp-cli';
	}

	public static function is_active() {
		return defined( 'WP_CLI' ) && WP_CLI;
	}

	/**
	 *
	 * @since  2.1.0
	 * @access public
	 */
	public function __construct() {
		\WP_CLI::add_command( 'elementor-pro license', '\ElementorPro\Modules\WpCli\License_Command' );
		\WP_CLI::add_command( 'elementor-pro update', '\ElementorPro\Modules\WpCli\Update' );
		\WP_CLI::add_command( 'elementor-pro theme-builder', '\ElementorPro\Modules\WpCli\ThemeBuilder' );
	}
}
