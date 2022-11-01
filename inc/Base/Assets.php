<?php

namespace Inc\Base;

class Assets extends BaseController
{
	public function register()
	{
		add_action('admin_enqueue_scripts', [$this, 'assets']);
	}

	public function assets()
	{
		wp_enqueue_style('iems-style', $this->pluginUrl . 'assets/iems.css');
		wp_enqueue_script('iems-script', $this->pluginUrl . 'assets/iems.js');
	}
}