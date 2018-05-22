<?php 
/*
 * Plugin Name: StripeJS Checkout
 * Version: 4.3.0
 * Description: The functionality to invoke a Stripe JavaScript popup checkout dialog
 * Plugin URI: https://github.com/phkcorporation/stripejs
 * Author: PHK Corporation
 * Author URI: https://phkcorp.com 
 * License: MIT
 * Text Domain: stripejs
 * Domain Path: /languages
 */

require dirname(__FILE__).'/stripe/init.php';
require_once dirname(__FILE__).'/page-template.php';
require_once dirname(__FILE__).'/admin/menu.php';
require_once dirname(__FILE__).'/admin/dashboard.php';
require_once dirname(__FILE__).'/ajax.php';
require_once dirname(__FILE__).'/shortcode.php';
require_once dirname(__FILE__).'/metabox.php';
require_once dirname(__FILE__).'/updater.php';


add_action('wp_head', 'stripejs_add_scripts');


function stripejs_add_scripts() {
    echo '<script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>';
}

if (is_admin()) {
   $config = array(
   	   'slug' => plugin_basename(__FILE__),
 	   'proper_folder_name' => 'stripejs',
	   'api_url' => 'https://api.github.com/repos/phkcorporation/stripejs',
	   'raw_url' => 'https://raw.github.com/phkcorporation/stripejs/master',
	   'github_url' => 'https://github.com/phkcorporation/stripejs',
	   'zip_url' => 'https://github.com/phkcorporation/stripejs/archive/master.zip',
	   'sslverify' => true,
	   'requires' => '4.9',
	   'tested' => '4.9',
	   'readme' => 'README.md',
	   'access_token' => ''
	);

   new WP_GitHub_Updater($config);
}

?>
