<?php
/**
 *
 * Tagged widget and gallery for HypeGallery
 * @author Daltonmedia - Daltonmedia.be
 *
*/
$viewer = elgg_get_logged_in_user_entity();
$page_owner = elgg_get_page_owner_entity();

if ($page_owner->guid == $viewer->guid) {
	$title = elgg_echo('tagged:mine');
} else {
	$title = elgg_echo('tagged:owner', array($page_owner->name));
}

elgg_push_breadcrumb($title);


$content = elgg_view('framework/gallery/dashboard/tagged');

$layout = elgg_view_layout('one_sidebar', array(
	'title' => $title,
	'content' => $content,
	'class' => 'gallery-dashboard'
		));

echo elgg_view_page($title, $layout);
