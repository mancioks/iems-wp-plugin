<?php

namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

class Admin extends BaseController
{
	public $settings;
	public $pages;
	public $subPages;
	public $callbacks;


	public function register()
	{
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();

		$this->setPages();
		$this->setSubPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages($this->pages)->addSubPages($this->subPages)->register();
	}

	public function setPages()
	{
		$this->pages = [
			[
				'page_title' => 'IEMS admin',
				'menu_title' => 'IEMS admin',
				'capability' => 'manage_options',
				'menu_slug' => 'iems_plugin',
				'callback' => [$this->callbacks, 'adminDashboard'],
				'icon_url' => 'dashicons-cloud-saved',
				'position' => 100
			]
		];
	}

	public function setSubPages()
	{
		$this->subPages = [
			[
				'parent_slug' => 'iems_plugin',
				'page_title' => 'Entries',
				'menu_title' => 'Entries',
				'capability' => 'manage_options',
				'menu_slug' => 'iems_entries',
				'callback' => [$this->callbacks, 'adminEntries'],
			]
		];
	}

	public function setSettings()
	{
		$args = [
			[
				'option_group' => 'iems_options',
				'option_name' => 'iems_endpoint',
				'callback' => [$this->callbacks, 'iemsEndpointInput']
			],
//			[
//				'option_group' => 'iems_options',
//				'option_name' => 'iems_entries',
//				'callback' => [$this->callbacks, 'iemsEntriesInput']
//			],
			[
				'option_group' => 'iems_options',
				'option_name' => 'iems_js_parser',
				'callback' => [$this->callbacks, 'iemsJsParserInput']
			],
		];

		$this->settings->setSettings($args);
	}

	public function setSections()
	{
		$args = [
			[
				'id' => 'iems_admin_index',
				'title' => 'Settings',
				'callback' => [$this->callbacks, 'iemsAdminSection'],
				'page' => 'iems_plugin'
			]
		];

		$this->settings->setSections($args);
	}

	public function setFields()
	{
		$args = [
			[
				'id' => 'iems_endpoint',
				'title' => 'IEMS endpoint URL',
				'callback' => [$this->callbacks, 'iemsEndpointField'],
				'page' => 'iems_plugin',
				'section' => 'iems_admin_index',
				'args' => [
					'label_for' => 'iems_endpoint',
				],
			],
//			[
//				'id' => 'iems_entries',
//				'title' => 'IEMS entries',
//				'callback' => [$this->callbacks, 'iemsEntriesField'],
//				'page' => 'iems_plugin',
//				'section' => 'iems_admin_index',
//				'args' => [
//					'label_for' => 'iems_entries',
//				],
//			],
			[
				'id' => 'iems_js_parser',
				'title' => 'IEMS JS parser',
				'callback' => [$this->callbacks, 'iemsJsParserField'],
				'page' => 'iems_plugin',
				'section' => 'iems_admin_index',
				'args' => [
					'label_for' => 'iems_js_parser',
				],
			],
		];

		$this->settings->setFields($args);
	}
}