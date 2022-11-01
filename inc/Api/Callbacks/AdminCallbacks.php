<?php

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		$this->render('admin');
	}

	public function adminEntries()
	{
		$entries = $this->entries;
		$this->render('entries');
	}

	public function iemsSettingInput($input)
	{
		return $input;
	}

	public function iemsEntriesInput($input)
	{
		return $input;
	}

	public function iemsAdminSection()
	{
		echo 'IEMS Client';
	}

	public function iemsEndpointField()
	{
		$value = esc_attr(get_option('iems_endpoint'));
		echo '<input type="text" class="regular-text" name="iems_endpoint" id="iems_endpoint" value="'.$value.'" placeholder="IEMS endpoint url">'.
		     '<p class="description">Default: <code>'. IEMS_ENDPOINT .'</code></p>';
	}

	public function iemsEntriesField()
	{
		$value = esc_attr(get_option('iems_entries'));
		echo '<textarea type="text" class="regular-text code" rows="8" name="iems_entries" id="iems_entries" placeholder="IEMS entries">'. $value .'</textarea>';
	}
}