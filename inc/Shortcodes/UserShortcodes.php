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
		$locale = substr(get_locale(), 0, 2);

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
				$value = $entry['value'];

				foreach ($entry['translations'] as $language => $translation) {
					if ($language == $locale) {
						$value = $translation;
						break;
					}
				}

				return $value;
			}
		}

		return '';
	}
}