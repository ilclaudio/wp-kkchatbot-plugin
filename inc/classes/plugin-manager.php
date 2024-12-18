<?php

/**
 * Definition of the Plugin Manager.
 *
 * @package WP_KKChatBot_Plugin
 */


/**
 * The manager that builds the tool and configures Wordpress.
 */
class KKC_PluginManager {
	/**
	 * The version of the plugin.
	 *
	 * @var  string    $version    The current version of the plugin.
	 */
	protected $version;
	/**
	 * The name of the plugin.
	 *
	 * @var  string    $version    The unique name of the plugin.
	 */
	protected $plugin_name;

	/**
	 * Initialize the Plugin Manager and load plugin dependencies.
	 */
	public function __construct() {
		$this->version     = KKC_PLUGIN_VERSION;
		$this->plugin_name = KKC_PLUGIN_NAME;
		// $this->load_file_dependencies();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Sets the folder for translations.
	 *
	 * @return void
	 */
	public function set_locale() {
		load_plugin_textdomain(
			KKC_PLUGIN_NAME,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

	public function enqueue_styles() {
		wp_enqueue_style(
			KKC_PLUGIN_NAME . '-public-style',
			KKC_PLUGIN_DIR_URL .'/public/css/kkchatbot.css',
			array(),
			KKC_PLUGIN_VERSION,
			'all' // Media ('all', 'screen', 'print').
		);
	}

	public function enqueue_javascript() {
		wp_enqueue_script(
			KKC_PLUGIN_NAME . '-public-javascript',
			KKC_PLUGIN_DIR_URL . '/public/js/kkchatbot.js',
			array('jquery'),
			KKC_PLUGIN_VERSION,
			true // Load the script into the footer (true) or into the header (false).
		);
	}

	public function add_homepage_chatbot(){
		$template_path = KKC_PLUGIN_DIR_PATH. 'public/page-templates/homepage-chatbot.php';

		// Includi il file template se esiste
		if (file_exists($template_path)) {
			include $template_path;
		}
	}

	/**
	 * Used to install and configure the plugin.
	 *
	 * @return void
	 */
	public function plugin_setup() {

		// Setup internationalization.
		add_action( 'init', array( $this, 'set_locale' ) );

		// Hook to load CSS ad JS
		add_action('wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action('wp_enqueue_scripts', array( $this, 'enqueue_javascript' ) );

		// Hook to load the ChatBot interface.
		add_action('wp_footer', array( $this, 'add_homepage_chatbot' ) );

	}



}
