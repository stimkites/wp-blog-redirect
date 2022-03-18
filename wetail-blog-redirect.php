<?php
/**
 * Plugin Name: WordPress Blog Redirect
 * Description: Allows redirections to selected blogs for defined countries. Enables custom language selector.
 * Version: 0.0.2
 * Author: Stim (Wetail AB)
 * Author URI: http://wetail.io
 * License: GPL-3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Wetail\Blog\Redirect;

defined( 'ABSPATH' ) or die();

/**
 * Plugin constants
 */
define( __NAMESPACE__ . '\ROOT_NAME', basename( __DIR__ ) );
define( __NAMESPACE__ . '\ROOT_URL', plugins_url() . '/' . ROOT_NAME );
define( __NAMESPACE__ . '\SLUG', basename( __DIR__ ) );
define( __NAMESPACE__ . '\PLUGIN_ID',  basename( __DIR__ ) . '/' . basename( __FILE__ ) );
define( __NAMESPACE__ . '\URL',   dirname( plugins_url() ) . '/' . basename( dirname( __DIR__ ) ) . '/' . ROOT_NAME  );
const ROOT_FILE = __FILE__;
const ROOT_PATH = __DIR__;
const ROOT_TPL_PATH = __DIR__ . '/templates';
const ASSETS_PATH = __DIR__ . '/assets';
const ASSETS_URL = URL . '/assets';


/**
 * Class autoloader
 */
require_once "autoload.php";

/**
 * Load plugin
 */
_self::load();
