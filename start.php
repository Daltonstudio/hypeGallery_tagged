<?php
/**
 *
 * Tagged widget and gallery for HypeGallery
 * @author Daltonmedia - Daltonmedia.be
 *
*/

elgg_register_event_handler('init', 'system', 'hypegallery_tagged_init');

function hypegallery_tagged_init() {

	//Adds the widget
    elgg_register_widget_type('tagged', elgg_echo("tagged:widget:title"), elgg_echo("tagged:widget:description"));		
    //Makes us a nice page handler
	elgg_register_page_handler('tagged', 'tagged_page_handler');
	// Get a link to the owner menu
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'tagged_owner_block_menu');

}



function tagged_page_handler($page, $handler) {
 
		include(dirname(__FILE__) . "/pages/tagged/index.php"); 
		return true;
    }

function tagged_owner_block_menu($hook, $type, $return, $params) {
	if (elgg_instanceof($params['entity'], 'user')) {
$url = "tagged/owner/{$params['entity']->username}";
$item = new ElggMenuItem('tagged', elgg_echo('tagged:owner_block'), $url);
$return[] = $item;
}
return $return;
}