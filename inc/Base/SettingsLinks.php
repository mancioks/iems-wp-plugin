<?php

namespace Inc\Base;

class SettingsLinks extends BaseController
{
	public function register()
	{
		add_filter('plugin_action_links_' . $this->baseName, [$this, 'settings_link']);
	}

	public function settings_link($links)
	{
		$settings_link = '<a href="admin.php?page=iems_plugin">Settings</a>';
		$links[] = $settings_link;

		return $links;
	}
}