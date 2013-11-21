<?php
/*
 * Plugin Name: Script Library: Ajax-Chosen
 * Plugin URI: http://wordpress.lowtone.nl/scripts-chosen
 * Plugin Type: lib
 * Description: Include Chosen Javascript libraries for better select boxes.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */

namespace lowtone\scripts\chosen\ajax {

	use lowtone\content\packages\Package;

	// Includes
	
	if (!include_once WP_PLUGIN_DIR . "/lowtone-content/lowtone-content.php") 
		return trigger_error("Lowtone Content plugin is required", E_USER_ERROR) && false;

	$GLOBALS["lowtone_scripts_chosen_ajax"] = Package::init(array(
			Package::INIT_PACKAGES => array("lowtone\\scripts", "lowtone\\scripts\\chosen"),
			Package::INIT_SUCCESS => function() {
				return array(
						"registered" => \lowtone\scripts\register(__DIR__ . "/assets/scripts", array("chosen.jquery"), "0.2.0")
					);
			}
		));

	function registered() {
		global $lowtone_scripts_chosen_ajax;
		
		return isset($lowtone_scripts_chosen_ajax["registered"]) ? $lowtone_scripts_chosen_ajax["registered"] : false;
	}
	
}