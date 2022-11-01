<?php

namespace Inc\Base;

class BaseController implements BaseControllerInterface
{
	public $pluginPath;
	public $pluginUrl;
	public $baseName;

	public function __construct()
	{
		$this->pluginPath = IEMS_PLUGIN_PATH;
		$this->pluginUrl = IEMS_PLUGIN_URL;
		$this->baseName = IEMS_BASENAME;
	}

	public function register() { }

	public function render($template)
	{
		require_once $this->pluginPath . 'templates/' . $template . '.php';
	}
}