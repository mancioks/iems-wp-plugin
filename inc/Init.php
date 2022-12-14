<?php

namespace Inc;

use Inc\Api\IemsApi;
use Inc\Shortcodes\UserShortcodes;

final class Init
{
	public static function get_services()
	{
		return [
			Pages\Admin::class,
			Base\Assets::class,
			Base\SettingsLinks::class,
			UserShortcodes::class,
			IemsApi::class,
		];
	}

	public static function register_services()
	{
		foreach (self::get_services() as $class) {
			$service = self::instantiate($class);

			if (method_exists($class, 'register')) {
				$service->register();
			}
		}
	}

	private static function instantiate($class)
	{
		return new $class();
	}
}