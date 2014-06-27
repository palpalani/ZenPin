<?php

// force UTF-8 Ø

/* Plug-in for theme option handling
 * The Admin Options page tests for the presence of this file in a theme folder
 * If it is present it is linked to with a require_once call.
 * If it is not present, no theme options are displayed.
 *
 */

require_once(dirname(__FILE__) . '/functions.php');

class ThemeOptions {

	function __construct() {
		$me = basename(dirname(__FILE__));
		setThemeOptionDefault('Allow_search', true);
		setThemeOptionDefault('albums_per_page', 24);
		setThemeOptionDefault('albums_per_row', 6);
		setThemeOptionDefault('images_per_page', 24);
		setThemeOptionDefault('images_per_row', 6);
		setThemeOptionDefault('image_size', 650);
		setThemeOptionDefault('image_use_side', 'longest');
		setThemeOptionDefault('thumb_size', 220);
		setThemeOptionDefault('thumb_crop_width', 220);
		setThemeOptionDefault('thumb_crop_height', 999);
		setThemeOptionDefault('thumb_crop', 1);
		setThemeOptionDefault('thumb_transition', 1);
		setOptionDefault('colorbox_' . $me . '_album', 1);
		setOptionDefault('colorbox_' . $me . '_image', 1);
		setOptionDefault('colorbox_' . $me . '_search', 1);
		if (class_exists('cacheManager')) {
			$me = basename(dirname(__FILE__));
			cacheManager::deleteThemeCacheSizes($me);
			cacheManager::addThemeCacheSize($me, getThemeOption('image_size'), NULL, NULL, NULL, NULL, NULL, NULL, false, NULL, NULL, NULL);
			cacheManager::addThemeCacheSize($me, getThemeOption('thumb_size'), NULL, NULL, getThemeOption('thumb_crop_width'), getThemeOption('thumb_crop_height'), NULL, NULL, true, NULL, NULL, NULL);
		}
	}

	function getOptionsSupported() {
		return array(
			gettext('Allow search')	 => array('key' => 'Allow_search', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Check to enable search form.'))
		);
	}

	function getOptionsDisabled() {
		return array('custom_index_page');
	}

	function handleOption($option, $currentValue) {
	}

}

?>