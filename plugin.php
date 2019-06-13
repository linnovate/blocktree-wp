<?php
namespace Elementree;

if (!defined('ABSPATH')) {
    exit('Press Enter to proceed...');
}

/**
 * Elementree plugin.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Instance.
	 *
	 * Holds the plugin instance.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @var $instance
	 */
	public static $instance = null;

	/**
	 * Render the widget output.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	*/
	public function get_widget($component_name, $uuid, $settings){
		$settings = json_encode($settings);
        
        return "<div id='$uuid' client-render='$component_name'></div>
              <script>
                CRRender(document.getElementById('$uuid'), '$component_name', $settings);
              </script>";
	}

	/**
	 * Add menu page.
	 *
	 * Written a page by add_menu_page, using client-render content.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	*/
	public function add_menu_page($page_name, $menu_slug, $component_name, $uuid, $settings = [], $icon = 'dashicons-chart-pie'){
			
		add_menu_page(
			$page_name,
			$page_name,
			'manage_options',
			$menu_slug, 
			function() use ($component_name, $uuid, $settings ) {
				echo $this->get_widget($component_name, $uuid, $settings);
			},
			$icon
		);
					
	}

	/**
	 * Add submenu page.
	 *
	 * Written a page by add_submenu_page, using client-render content.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	*/
	public function add_submenu_page($parent_slug, $page_name, $menu_slug, $component_name, $uuid, $settings = []){
			
		add_submenu_page(
			$parent_slug,
			$page_name,
			$page_name,
			'manage_options',
			$menu_slug, 
			function() use ($component_name, $uuid, $settings ) {
				echo $this->get_widget($component_name, $uuid, $settings);
			}
		);
					
	}
	
	/**
	 * Instance.
	 *
	 * Ensures only one instance of the plugin class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return Plugin An instance of the class.
	 */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
		}
		
	/**
	 * Plugin constructor.
	 *
	 * Initializing Elementree plugin.
	 *
	 * @since 1.0.0
	 * @access private
	 */
    private function __construct() {	
		// adding settings page
		new Settings();

		// adding js files
		add_action('init', function() {
		  wp_enqueue_script( 'elementree-base', plugin_dir_url( __FILE__ ) . 'assets/js/elementree-base.js', [], false, false );
		  wp_enqueue_script( 'elementree-components', get_option('client_render_components_js_path'), [ 'elementree-base' ], false, false );
	
		}, 100);
		}
}

Plugin::instance();
