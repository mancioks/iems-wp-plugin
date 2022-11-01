<?php

namespace Inc\Base;

use Inc\Init;

class Activate
{
	public static function activate()
	{
		flush_rewrite_rules();

		$endpointUrl = get_option('iems_endpoint');

		if (!$endpointUrl || $endpointUrl == '') {
			update_option('iems_endpoint', IEMS_ENDPOINT);
		}

		$endpointUrl = get_option('iems_endpoint');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpointUrl);
		curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
		    'url' => get_site_url(),
		    'name' => get_bloginfo('name'),
	    ]));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec($ch);
		curl_close ($ch);
	}
}