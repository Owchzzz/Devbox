<?php 
/**
 * Plugin Name: ionicons
 * Plugin URI: https://github.com/ConnectThink/ionicons
 * Description: Adds support for ionicons http://http://ionicons.com/
 * Version: 1.0.0
 * Author: Connect Think
 * Author URI: http://connectthink.com
 * License: MIT
 */


/*
 * PLUGIN GLOBAL VARIABLES
 */

// Plugin Paths
if (!defined('IONICONS_PLUGIN_NAME'))
    define('IONICONS_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

if (!defined('IONICONS_PLUGIN_URL'))
    define('IONICONS_PLUGIN_URL', WP_PLUGIN_URL . '/' . IONICONS_PLUGIN_NAME);

// Plugin Version
if (!defined('IONICONS_VERSION_KEY'))
    define('IONICONS_VERSION_KEY', 'ionicons_version');

if (!defined('IONICONS_VERSION_NUM'))
    define('IONICONS_VERSION_NUM', '1.0.0');

// Add version to options table
add_option(IONICONS_VERSION_KEY, IONICONS_VERSION_NUM);

/*
 * ADD CHEAT SHEET LINK 
 */
add_filter('plugin_action_links', 'ionicons_plugin_action_links', 10, 2);
function ionicons_plugin_action_links($links, $file) {
  static $this_plugin;

  if( !$this_plugin ) {
    $this_plugin = plugin_basename(__FILE__);
  }

  if ($file == $this_plugin) {
    $settings_link = '<a href="' . IONICONS_PLUGIN_URL .'/cheatsheet.html" target="_blank">Cheat Sheet</a>';
    array_unshift($links, $settings_link);
  }

  return $links;
}

/*
 * CLASS DEFINITION
 */
class IonIcons {

  /**
   * Define stylesheet properties for enqueuing
   * Add hooks to enqueue stylesheets and register shortcode
   */
  public function __construct() {
    $this->name = IONICONS_PLUGIN_NAME;
    $this->uri = IONICONS_PLUGIN_URL . '/css/ionicons.min.css';
    $this->ver = '1.0';

    add_action('wp_enqueue_scripts', array($this, 'register_ionicons'));
    add_action('admin_enqueue_scripts', array($this, 'register_ionicons'));

    add_shortcode('icon', array($this, 'ionicons_shortcode'));
  }

  /**
   * Enqueues stylesheet using instance properties
   * @return nothing
   */
  public function register_ionicons() {
    wp_enqueue_style( $this->name, $this->uri, array(), $this->ver, 'all');
  }

  /**
   * Define Shortcode [icon name=ion-icon-name]
   * @param  string $atts = name of icon to be passed in shortcode
   * @return html for icon display using passed $atts
   */
  public function ionicons_shortcode($atts) {
    extract(shortcode_atts(array(
                    'name'  => '',
                ), $atts));

    return '<i class="icon ' . $atts['name'] . '">&nbsp;</i>';
  }

} // End Class Definition


/*
 * OBJECT INSTANTIATION
 */
$ionicons = new IonIcons; 