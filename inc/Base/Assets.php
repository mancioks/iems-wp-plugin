<?php

namespace Inc\Base;

class Assets
{
	public function register()
	{
		add_action('admin_enqueue_scripts', [$this, 'assets']);
	}

	public function assets()
	{
		wp_enqueue_style('iems-style', PLUGIN_URL . 'assets/iems.css');
		wp_enqueue_script('iems-script', PLUGIN_URL . 'assets/iems.js');
	}
}