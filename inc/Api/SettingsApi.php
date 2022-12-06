<?php

namespace Inc\Api;

use Inc\Services\IemsService;

class SettingsApi
{
	public $admin_pages = [];
	public $admin_subpages = [];
	public $settings = [];
	public $sections = [];
	public $fields = [];

	public function register()
	{
		if (!empty($this->admin_pages)) {
			add_action('admin_menu', [$this, 'add_admin_menu']);
		}

		if (!empty($this->settings)) {
			add_action('admin_init', [$this, 'registerCustomFields']);
		}
	}

	public function addPages(array $pages)
	{
		$this->admin_pages = $pages;

		return $this;
	}

	public function addSubPages (array $pages)
	{
		$this->admin_subpages = $pages;

		return $this;
	}

	public function setSettings(array $settings)
	{
		$this->settings = $settings;

		IemsService::cacheClear();

		return $this;
	}

	public function setSections(array $sections)
	{
		$this->sections = $sections;

		return $this;
	}

	public function setFields(array $fields)
	{
		$this->fields = $fields;

		return $this;
	}

	public function add_admin_menu()
	{
		foreach ($this->admin_pages as $page) {
			add_menu_page(
				$page['page_title'],
				$page['menu_title'],
				$page['capability'],
				$page['menu_slug'],
				$page['callback'],
				$page['icon_url'],
				$page['position']
			);
		}

		foreach ($this->admin_subpages as $page) {
			add_submenu_page(
				$page['parent_slug'],
				$page['page_title'],
				$page['menu_title'],
				$page['capability'],
				$page['menu_slug'],
				$page['callback'],
			);
		}
	}

	public function registerCustomFields()
	{
		foreach ($this->settings as $setting) {
			register_setting($setting['option_group'], $setting['option_name'], $setting['callback'] ?? '');
		}

		foreach ($this->sections as $section) {
			add_settings_section($section['id'], $section['title'], $section['callback'] ?? '', $section['page']);
		}

		foreach ($this->fields as $field) {
			add_settings_field($field['id'], $field['title'], $field['callback'] ?? '', $field['page'], $field['section'], $field['args'] ?? '');
		}
	}
}