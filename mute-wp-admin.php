<?php   

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


load_plugin_textdomain( 'mute-wp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


if (isset($_POST["savebutton"])){

		if (isset($_POST["plugins"])){

			mwpn_disable_plugin_update_notification();

		

		}else{

			mwpn_enable_plugin_update_notification();

		
	
		}
		
		
		
		if (isset($_POST["wordpress"])){

			mwpn_disable_core_update_notification();

		
		
		

		}else{

			mwpn_enable_core_update_notification();
			
			
		
	
		}

		if (isset($_POST["themes"])){

			mwpn_disable_theme_update_notification();

			echo "<script>window.location.href='http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."';</script>";

		}else{

			mwpn_enable_theme_update_notification();

			echo "<script>window.location.href='http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."';</script>";
	
		}
		
		
		
		
}



if(get_option( 'mute_plugin_update') =='1'){$plugins_muteado=true;}else{$plugins_muteado=false;}
if(get_option( 'mute_core_update') =='1'){$core_muteado=true;}else{$core_muteado=false;}
if(get_option( 'mute_theme_update') =='1'){$theme_muteado=true;}else{$theme_muteado=false;}

?>


    <div class="wrap" style="width:100%;height:700px !important;background:url( '<?php echo   plugin_dir_url( __FILE__ ).'images/shutup_fondo.png' ?> ' ) center no-repeat" >
        <h2><?php _e('Disable Wordpress notifications','mute-wp');?></h2>
			
		
<div align="left">
<form name="opciones" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<br>
<input type="checkbox" id="plugins" name="plugins"  <?php if(isset($_POST['plugins'])|| $plugins_muteado== true) echo "checked='checked'"; ?> onclick="" /><?php _e('Disable plugins update notifications','mute-wp'); ?><br>
<br>
<input type="checkbox" id="wordpress" name="wordpress"  <?php if(isset($_POST['wordpress'])|| $core_muteado== true) echo "checked='checked'"; ?> onclick="" /><?php _e('Disable Wordpress core update notifications','mute-wp'); ?><br>
<br>
<input type="checkbox" id="themes" name="themes"  <?php if(isset($_POST['themes'])|| $theme_muteado== true) echo "checked='checked'"; ?> onclick="" /><?php _e('Disable themes update notifications','mute-wp'); ?><br>
<br>
<input type="submit" name="savebutton" value="<?php _e('Save','mute-wp'); ?>"/>
</form>


</div>

		
    </div>
    <?php
