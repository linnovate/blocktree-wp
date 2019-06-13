<?php
namespace Elementree;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings
{
    /**
     * Holds the values to be used in the fields callbacks
     */
   // private $options;

    /**
     * Start up
     */
    public function __construct()
    {
       add_action( 'admin_init', array( $this, 'client_render_setup_init' ) );
       add_action( 'admin_menu', array( $this, 'client_render_setup_menu' ) );
    }

/**
	 * add settings sections and fields for the config page of the plugin in admin panel
	 */
	public function client_render_setup_init(){
		
        add_settings_section("client_render_settings", "", array($this, 'section_callback'), "client_render_settings_fields");
       
	   // title field
	    add_settings_field( 'client_render_components_js_path', 'Compontents Js path: ', array( $this, 'compontents_js_path_form_element' ), 'client_render_settings_fields', "client_render_settings" );
	    register_setting("client_render_settings", "client_render_components_js_path");
    }

    /**
	 * function: client_render_setup_menu
	 *
	 * creating a menu item in the admin menu for the plugin
	 */
	public function client_render_setup_menu(){
		add_options_page( 'Client render', 'Client render', 'manage_options', 'client-render', array($this,'client_render_config_form' ));
	}

    /**
	 * create the title field in the config page
	 */
    public function compontents_js_path_form_element(){ ?>
		 <input style="width: 100%" type="text" name="client_render_components_js_path" id="client_render_components_js_path" lang="255" value="<?php echo get_option('client_render_components_js_path'); ?>" />
    <?php
    }

	
	/**
	 * section callback function from add_settings_section function
	 * we can add here description and etc. as the example in the comment
	 * we are keeping this for an example
	 */
    public function section_callback( $arguments ) {

    }

	/**
	 * function: client_render_config_form
	 *
	 * creating a config form for the plugin
	 */
	public function client_render_config_form(){
		?>
		<div>
		
		<h1>Client-Render Settings</h1>
		<form method="post" action="options.php">
		<?php 
			settings_fields("client_render_settings");
            do_settings_sections("client_render_settings_fields");
            submit_button();
		?>
		</form>
		</div>
		<?php
        
	}
}
