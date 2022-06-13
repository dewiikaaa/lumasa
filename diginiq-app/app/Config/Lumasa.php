<?php namespace Config;

class Lumasa extends \Arifrh\Themes\Config\Themes
{
	/**
	 * Default Theme name
	 *
	 * This can be overide on run-time
	 */
	public $theme = 'flattern';

	/**
	 * Wether use only one full template (skip header & footer template)
	 */
	public $use_full_template = false;

	/**
	 * Registered Plugins
	 * Format:
	 * [
	 * 	 'plugin_key_name' => [
	 * 		'js'  => [...js_array]
	 * 		'css'  => [...css_array]
	 *   ]
	 * ]
	 *
	 */
	public $plugins = [
		'bootbox' => [
			'js' => [
				'bootbox/bootbox-ja.min.js'
			]
		]
	];

}
