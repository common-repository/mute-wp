=== Mute Wordpress back end Notifications===
Contributors: MiguelMerin
Donate link: http://www.pludo.net
Tags: notifications, Wordpress updates
Requires at least: 4.1
Tested up to: 4.5
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


This plugin disables updates notification inside Wordpress back end for updates of WP core, themes and plugins.

== Description ==

This plugin disables updates notification inside Wordpress back end for updates of Wordpress core, themes and plugins.

NOTE: Notice that this plugin only prevents Wordpress from notifiying about latest Wordpress core, themes and plugins 

releases; but it DOES NOT disable an eventual auto update if `WP_AUTO_UPDATE_CORE` constant is set to true - configured 

in functions.php inside your active theme - or if it's configured with filters as described in Codex documentation: 

https://codex.wordpress.org/Configuring_Automatic_Background_Updates

**USE THIS PLUGIN AT YOUR OWN RISK. Wordpress needs to update itself for security reasons** 


== Installation ==

1. Upload plugin .zip file through Wordpress back end section (Plugins/Add new/ Upload Plugin)
2. Activate plugin from Plugins menu.

== Frequently Asked Questions ==

= Does this plugin disable core, theme and plugin updates? =

No, this plugin lets you disable back end **notifications** for these three types of updates.


== Screenshots ==

1. Once activated, select type of notification to disable.
2. And save.

== Changelog ==

= 1.0 =
* First version of this plugin. 
= 1.1 =
* Added removal of red circle notifications in admin menu and red rows and messages in plugin list page. 

== Upgrade Notice ==

* Next version will let you control updates too. ;)

== Important ==

Changes applied to notifications will remain if you leave options checked before uninstalling the plugin. 

You can revert changes by uncheking all options before uninstalling. 

This will be taken into account to transform it an additional option in further versions.

**USE THIS PLUGIN AT YOUR OWN RISK. Wordpress needs to update itself for security reasons** 