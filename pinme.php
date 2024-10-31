<?php
/**
 * PinMe - a Wordpress Pinterest embeder
 *
 * @package     pinme_pinterest
 * @author      Joseph Foster
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: PinMe
 * Description: easaly add Pinterest embeds with shortcodes.
 * Version:     1.0.0
 * Author:      Joseph Foster
 * Text Domain: pinme_pinterest
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
**/

wp_register_script( 'pinme_pinterest', '//assets.pinterest.com/js/pinit.js' );


function pinme_pins( $atts )
{
	$m = shortcode_atts( array(
		'url' 			=> '',
		'type'			=> 'embedBoard',
		'board-width'	=> '400',
		'scale-height'	=> '320',
		'scale-width'	=> '100',
	), $atts);

	if ( empty( $m['url']) )
	{
		return false;
	}

	$url = '<a href="'.$m['url'].'" data-pin-do="'.$m['type'].'"';

	if ( isset( $m['board-width'] ) )
	{	
		$url .= 'data-pin-board-width="'.$m['board-width'].'"';
	}
	if ( isset( $m['scale-height'] ) )
	{	
		$url .= 'data-pin-scale-height="'.$m['scale-height'].'"';
	}
	if ( isset( $m['scale-width'] ) )
	{	
		$url .= 'data-pin-scale-width="'.$m['scale-width'].'">';
	}
	$url .= '</a>';

	echo $url;
	
	return true;

}
add_shortcode( 'pinme', 'pinme_pins' );


?>