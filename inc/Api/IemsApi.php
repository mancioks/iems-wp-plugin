<?php

namespace Inc\Api;

use Inc\Base\BaseController;
use Inc\Services\IemsService;

class IemsApi extends BaseController
{
	public function register()
	{
		add_action('rest_api_init', function () {
			register_rest_route(
				'api',
				'iems',
				[
					'methods' => 'POST',
					'callback' => [$this, 'apiCallback']
				]
			);
		});

		add_action('rest_api_init', function () {
			register_rest_route(
				'api',
				'iems/entries',
				[
					'methods' => 'GET',
					'callback' => [$this, 'apiEntriesCallback']
				]
			);
		});
	}

	public function apiEntriesCallback()
	{
		return $this->entries;
	}

	public function apiCallback(\WP_REST_Request $request)
	{
		if ( ! current_user_can( 'manage_options' ) ) {
			return [
				'status' => 'forbidden',
				'message' => 'not authenticated',
			];
		}

		$body = $request->get_body();

		update_option('iems_entries', $body);

		IemsService::cacheClear();

		return [
			'status' => 'success',
			'message' => 'updated',
		];
	}
}