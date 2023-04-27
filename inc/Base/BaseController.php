<?php

namespace Inc\Base;

class BaseController implements BaseControllerInterface
{
	public $pluginPath;
	public $pluginUrl;
	public $baseName;
	public $entries;
	public $parseWithJs;

	public function __construct()
	{
		$this->pluginPath = IEMS_PLUGIN_PATH;
		$this->pluginUrl = IEMS_PLUGIN_URL;
		$this->baseName = IEMS_BASENAME;
		$this->entries = $this->getEntries();
		$this->parseWithJs = $this->isParseByJsEnabled();
	}

	private function getEntries()
	{
		$entries = json_decode(get_option('iems_entries'), true);

		return $entries['entries'] ?? [];
	}

	private function isParseByJsEnabled()
	{
		$parseByJs = json_decode(get_option('iems_js_parser'), true);

		return $parseByJs == 1;
	}

	public function register() { }

	public function render($template)
	{
		require_once $this->pluginPath . 'templates/' . $template . '.php';
	}
}