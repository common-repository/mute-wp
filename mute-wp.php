<?php
/**
/*
Plugin Name: Mute Wordpress back end Notifications
Plugin URI: http://www.pludo.net/mute-wp.zip
Author: Miguel Merín
Description: This plugin hides Wordpress back end update notifications for Wordpress core, themes and plugins.
Version: 1.0
Author URI: http://www.pludo.net

MWPN_LICENSE

 * Mute Wordpress back end Notifications (MWPN) program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with GNU gv; see the file COPYING.  If not, write to
 * the Free Software Foundation, Inc., 59 Temple Place - Suite 330,
 * Boston, MA 02111-1307, USA.
 *
 *   Author: Miguel Merín          Web Developper
 * Internet: www.pludo.net         
 *    email: miguelmerin@gmail.com
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


load_plugin_textdomain( 'mute-wp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


 function mwpn_options_page() {
 

 include('mute-wp-admin.php');
 
 add_option( 'mute_plugin_update', '0', '', 'yes' );
 add_option( 'mute_core_update', '0', '', 'yes' );
 



 }


function mwpn_set_menu_item() {
 

 
  add_menu_page (
        'Mute Wordpress Update Notifications',
        'Mute WP',
        'manage_options',
        'plugin-notifications',
        'mwpn_options_page',
        plugin_dir_url( __FILE__ ).'icons/shutup.png',
		2000
    );
 
 

 
 
}
 
add_action('admin_menu', 'mwpn_set_menu_item');



function mwpn_delete_all_between($beginning, $end, $string) {

		  $beginningPos = strpos($string, $beginning);
		  $endPos = strpos($string, $end);
		  if ($beginningPos === false || $endPos === false) {
			return $string;
		  }

		  $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

		  return str_replace($textToDelete, '', $string);
}


function mwpn_closingphptag($texto){
		
		$final=substr($texto,-2);
	
		if ($final=="?>" ) {
		
		$cortado=substr($texto, 0, -2);
		
		return $cortado;
		

		}else{ return $texto;}

}

function mwpn_disable_plugin_update_notification(){


			$fichero = get_template_directory().'/functions.php';	
			
			$functions = file_get_contents($fichero);
			
			$functions= mwpn_closingphptag($functions);

			$functions = str_replace("/***  Remove plugins update notification ***/ 	
			remove_action('load-update-core.php','wp_update_plugins');
			add_filter('pre_site_transient_update_plugins','__return_null');   
			/****  Remove plugins update notification ****/","",$functions);



			$functions.="/***  Remove plugins update notification ***/ 	
			remove_action('load-update-core.php','wp_update_plugins');
			add_filter('pre_site_transient_update_plugins','__return_null');   
			/****  Remove plugins update notification ****/";


				
			file_put_contents($fichero, $functions);
				

			update_option('mute_plugin_update','1');

	
}

function mwpn_enable_plugin_update_notification(){
		
			$fichero = get_template_directory().'/functions.php';

			$functions = file_get_contents($fichero);


			$functions = mwpn_delete_all_between('/***  Remove plugins update notification ***/', '/****  Remove plugins update notification ****/', $functions);

	
			file_put_contents($fichero, $functions);


			update_option('mute_plugin_update','0');	

	
}


 
 function mwpn_disable_core_update_notification(){
	 
	 
			$fichero = get_template_directory().'/functions.php';

			$functions = file_get_contents($fichero);
			
			$functions= mwpn_closingphptag($functions);

				$functions=str_replace("/***core***/

				add_filter('pre_site_transient_update_core','remove_core_updates');

				/****core****/","", $functions);
		

			$functions.="/***core***/

			add_filter('pre_site_transient_update_core','remove_core_updates');

			/****core****/";

											
			file_put_contents($fichero, $functions);


			update_option('mute_core_update','1');

	 
	 
 }


  function mwpn_enable_core_update_notification(){
	 
			 
		$fichero = get_template_directory().'/functions.php';
		

		$functions = file_get_contents($fichero);

		$functions = mwpn_delete_all_between("/***core***/","/****core****/",$functions);
		

		file_put_contents($fichero, $functions);


		update_option('mute_core_update','0');

	 
	 
 }
 
 
 
 //Themes
 
 
 
 function mwpn_disable_theme_update_notification(){

			$fichero = get_template_directory().'/functions.php';
			
			$functions = file_get_contents($fichero);
			
			$functions= mwpn_closingphptag($functions);



			$functions = str_replace("/***  Remove themes update notification ***/
			
			add_filter('pre_site_transient_update_themes','remove_core_updates');
			
			/****  Remove themes update notification ****/","",$functions);




			$functions.="/***  Remove themes update notification ***/
			
			add_filter('pre_site_transient_update_themes','remove_core_updates');
			
			/****  Remove themes update notification ****/";

			
			
			
				
				
			file_put_contents($fichero, $functions);
				
	

			

			update_option('mute_theme_update','1');

	
}

function mwpn_enable_theme_update_notification(){
		
			$fichero = get_template_directory().'/functions.php';
			
			$functions = file_get_contents($fichero);


			$functions = mwpn_delete_all_between('/***  Remove themes update notification ***/', '/****  Remove themes update notification ****/', $functions);

		
			file_put_contents($fichero, $functions);


			update_option('mute_theme_update','0');	


	
}
 
 
