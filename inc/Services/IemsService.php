<?php

namespace Inc\Services;

class IemsService
{
	public static function cacheClear()
	{
		if (has_action('litespeed_purge_all')) {
			do_action('litespeed_purge_all');
		}
	}
}