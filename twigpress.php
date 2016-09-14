<?php

/**
 * TwigPress bootstrap file
 *
 * @link              https://github.com/mikeshawdev/twigpress
 * @since             2.0.0
 * @package           TwigPress
 *
 * @wordpress-plugin
 * Plugin Name:       TwigPress
 * Plugin URI:        https://github.com/mikeshawdev/twigpress/
 * Description:       Provides functionality for using the Twig templating engine in your theme.
 * Version:           2.0.0
 * Author:            Mike Shaw <mikeshawweb@gmail.com>
 * URI:               https://github.com/mikeshawdev/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       twigpress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-twigpress-activator.php
 */
function activate_twigpress()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-twigpress-activator.php';
    TwigPress_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-twigpress-deactivator.php
 */
function deactivate_twigpress()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-twigpress-deactivator.php';
    TwigPress_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_twigpress');
register_deactivation_hook(__FILE__, 'deactivate_twigpress');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-twigpress.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.0.0
 */
function run_twigpress()
{
    $plugin = new TwigPress();
    $plugin->run();
}

run_twigpress();
