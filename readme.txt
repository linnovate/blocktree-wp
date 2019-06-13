=== Elementree ===
Contributors: Linnovate
Donate link: https://linnovate.net/
Tags: elementree
Requires at least: 4.0
Tested up to: 4.9
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
Elementree is client render switcher.

== Installation ==

1. Upload the Elementree plugin to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.



== Exemple ==

Adding simple page and sub page

```php
add_action('admin_menu', function() {

	ClientRender::$instance->add_menu_page('Title', 'my-menu-slug', 'my-component_name', 'my-uuid');

	ClientRender::$instance->add_submenu_page('my-menu-slug', 'Title Sub', 'my-sub-menu-slug', 'my-component_name', 'my-uuid');

});
```

== Screenshots ==


== Changelog ==



