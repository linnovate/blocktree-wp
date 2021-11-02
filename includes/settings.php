<?php

namespace Blocktree;

if (!defined('ABSPATH')) {
	exit;
}

class Settings
{
	/**
	 * Holds the values to be used in the fields callbacks
	 */

	/**
	 * Start up
	 */
	public function __construct()
	{
		add_action('admin_init', array($this, 'blocktree_setup_init'));
		add_action('admin_menu', array($this, 'blocktree_setup_menu'));
	}

	/**
	 * add settings sections and fields for the config page of the plugin in admin panel
	 */
	public function blocktree_setup_init()
	{
		add_settings_section("blocktree_settings", "", array($this, 'section_callback'), "blocktree_settings_fields");

		add_settings_field('blocktree_widgets_files', 'Blocktree widgets files: ', array($this, 'widgets_files_form_element'), 'blocktree_settings_fields', "blocktree_settings");

		register_setting("blocktree_settings", "blocktree_widgets_files");
	}

	/**
	 * function: blocktree_setup_menu
	 *
	 * creating a menu item in the admin menu for the plugin
	 */
	public function blocktree_setup_menu()
	{
		add_options_page('Blocktree', 'Blocktree', 'manage_options', 'blocktree', array($this, 'blocktree_config_form'));
	}

	/**
	 * create the title field in the config page
	 */
	public function widgets_files_form_element()
	{
?>
		<textarea style="width: 100%" name="blocktree_widgets_files" id="blocktree_widgets_files" rows="4"><?php echo get_option('blocktree_widgets_files'); ?></textarea>
	<?php
	}

	/**
	 * section callback function from add_settings_section function
	 * we can add here description and etc. as the example in the comment
	 * we are keeping this for an example
	 */
	public function section_callback($arguments)
	{
	}

	/**
	 * function: blocktree_config_form
	 *
	 * creating a config form for the plugin
	 */
	public function blocktree_config_form()
	{
	?>
		<div>

			<h1>Blocktree Settings</h1>
			<form method="post" action="options.php">
				<?php
				settings_fields("blocktree_settings");
				do_settings_sections("blocktree_settings_fields");
				submit_button();
				?>
			</form>
		</div>
<?php
	}
}
