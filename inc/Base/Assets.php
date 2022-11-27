<?php

namespace Inc\Base;

class Assets extends BaseController
{
	public function register()
	{
		add_action('admin_enqueue_scripts', [$this, 'assets']);
		add_action('wp_enqueue_scripts', [$this, 'publicAssets']);
	}

	public function assets()
	{
		wp_enqueue_style('iems-style', $this->pluginUrl . 'assets/iems.css');
		wp_enqueue_script('iems-script', $this->pluginUrl . 'assets/iems.js');
	}

	public function publicAssets()
	{
		wp_enqueue_script('iems-public-script', $this->pluginUrl . 'assets/iems-public.js');
		wp_localize_script('iems-public-script', 'IEMSURLS', [
			'entries' => rest_url('api/iems/entries'),
			'locale' => substr(get_locale(), 0, 2),
		]);
	}
}