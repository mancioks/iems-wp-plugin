<?php

namespace Inc\Base;

class Activate
{
	public static function activate()
	{
		flush_rewrite_rules();

		$endpointUrl = get_option('iems_endpoint');

		if (!$endpointUrl || $endpointUrl == '') {
			update_option('iems_endpoint', IEMS_ENDPOINT);
		}
	}
}