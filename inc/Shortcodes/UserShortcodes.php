<?php

namespace Inc\Shortcodes;

use Inc\Base\BaseController;

class UserShortcodes extends BaseController
{
	public function register()
	{
		add_shortcode( 'iems', [$this, 'iemsUserShortcode'] );
	}

	public function iemsUserShortcode($atts = array(), $content = null, $tag = '')
	{
		if (isset($atts['id'])) {

			$id = $atts['id'];
			$entry = null;

			foreach ($this->entries as $element) {
				if ($element['id'] == $id) {
					$entry = $element;
					break;
				}
			}

			if ($entry) {
				return $entry['value'];
			}
		}

		return '';
	}
}