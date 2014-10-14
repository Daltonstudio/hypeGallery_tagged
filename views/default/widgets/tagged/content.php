<?php
/**
 *
 * Tagged widget and gallery for HypeGallery
 * @author Daltonmedia - Daltonmedia.be
 *
*/
$entity = elgg_extract('entity', $vars);
$owner = $entity->getOwnerEntity();

$options = array(
	'types' => 'object',
	'subtypes' => array('hjimagetag'),
	'owner_guids' => $owner->guid,
);

$tags = elgg_get_entities($options);
foreach ($tags as $tag) {
		$containers[] = $tag->getContainerGUID();
	}
if (!$tags) {
	echo elgg_echo('tagged:widget:none');
	return true;
}
	

$taggedimages = array(
	'types' => 'object',
	'subtypes' => array('hjalbumimage'),
	'guids' => $containers,
	'limit' => $entity->num_display,
	'count' => true,
	'list_type' => 'gallery',
	'gallery_class' => 'elgg-gallery-users',
	'full_view' => true,
	'size' => 'small',
);


elgg_push_context('activity');
$content = elgg_list_entities($taggedimages);
echo $content;
if ($content) {
		$more_link = elgg_view('output/url', array(
		'href' => "tagged/owner/" . $owner->username,
		'text' => elgg_echo('tagged:widget:more'),
		'is_trusted' => true,
	));
	echo "<span class=\"elgg-widget-more\">$more_link</span>";
} 	