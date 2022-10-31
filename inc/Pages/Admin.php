<?php

namespace Inc\Pages;

class Admin
{
	public function register()
	{
		add_action('admin_menu', [$this, 'add_admin_pages']);
		add_filter('plugin_action_links_' . BASENAME, [$this, 'settings_link']);
	}

	public function settings_link($links)
	{
		$settings_link = '<a href="admin.php?page=iems_plugin">Settings</a>';
		$links[] = $settings_link;

		return $links;
	}

	public function add_admin_pages()
	{
		add_menu_page(
			'IEMS admin',
			'IEMS admin',
			'manage_options',
			'iems_plugin',
			[$this, 'admin_index'],
			'',
			null
		);
	}

	public function admin_index()
	{
		require_once PLUGIN_PATH . 'templates/admin.php';
	}
}