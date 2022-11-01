<?php

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

class Admin extends BaseController
{
	public $settings;

	public function __construct()
	{
		parent::__construct();

		$this->settings = new SettingsApi();
	}

	public function register()
	{
		$pages = [
			[
				'page_title' => 'IEMS admin',
				'menu_title' => 'IEMS admin',
				'capability' => 'manage_options',
				'menu_slug' => 'iems_plugin',
				'callback' => function() {$this->render('admin');},
				'icon_url' => 'dashicons-cloud-saved',
				'position' => 100
			]
		];

		$subPages = [
			[
				'parent_slug' => 'iems_plugin',
				'page_title' => 'Entities',
				'menu_title' => 'Entities',
				'capability' => 'manage_options',
				'menu_slug' => 'iems_entities',
				'callback' => function() {$this->render('entities');},
			]
		];

		$this->settings->addPages($pages)->addSubPages($subPages)->register();
	}
}