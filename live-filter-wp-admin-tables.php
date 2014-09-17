<?php
/**
 * Live Filter Admin WP List Tables
 *
 * @package   Live Filter Admin WP List Tables
 * @author    Bryan Willis <businesscandid@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.canddibusiness.com
 *
 * @wordpress-plugin
 * Plugin Name:       Live Filter Admin WP List Tables
 * Plugin URI:        @TODO
 * Description:       Adds live filtering to wordpress list tables on admin edit screens and plugins screens
 * Version:           1.0.0
 * Author:            Bryan Willis
 * Author URI:        http://profiles.wordpress.org/codecandid
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: @TODO
 */

if (!defined('WPINC')) {
	die;
}


class LiveFilterAdminEditScreenTables
{
	public function __construct()
	{
		add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
		add_action('admin_head-edit.php', array($this, 'admin_head'));
                add_action('admin_head-plugins.php', array($this, 'admin_head'));
	}
	
	public function admin_enqueue_scripts( $hook_suffix )
	{

         if ($hook_suffix == 'edit.php' || $hook_suffix == 'plugins.php') {

	        wp_enqueue_script('jquery_filterTable', plugin_dir_url(__FILE__) . 'jquery.live-filter-wp-list-tables.js', array(
				'jquery'
			) , '1.0.0', true);

                wp_enqueue_script('jquery_ready_filterTable', plugin_dir_url(__FILE__) . 'jquery.live-filter-wp-list-tables-init.js', array(
				'jquery_filterTable'
			) , '1.0.0', true);	
         }

	}
	
	public function admin_head()
	{       
		?>
		<style type="text/css">
			.filter-table .quick { 
				margin-left: 0.5em; 
				font-size: 0.8em; 
				text-decoration: none; 
			}
			.fitler-table .quick:hover { 
				text-decoration: underline; 
			}
			td.alt { background-color: rgba(255, 255, 0, 0.2); }
		</style>
		<?php 
	}
}

add_action('init', function() { new LiveFilterAdminEditScreenTables(); });
