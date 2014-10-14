<?php
/**
 *
 * Tagged widget and gallery for HypeGallery
 * @author Daltonmedia - Daltonmedia.be
 *
*/
$page_owner = elgg_get_page_owner_entity();
$options = array(
	'types' => 'object',
	'subtypes' => array('hjimagetag'),
	'owner_guids' => $page_owner->guid,
);


$tags = elgg_get_entities($options);
foreach ($tags as $tag) {
		$containers[] = $tag->getContainerGUID();
	}
if (!$tags) {
	echo '<p>' . elgg_echo('tagged:notags') . '</p>';
	return true;
}
$taggedimages = array(
	'types' => 'object',
	'subtypes' => array('hjalbumimage'),
	'guids' => $containers,
	'full_view' => false,
	'list_type' => 'gallery',
	'list_type_toggle' => false,
	'gallery_class' => 'gallery-photostream',
	'pagination' => true,
	'limit' => get_input('limit', 10),
	'offset' => get_input('offset-albums', 0),
	'offset_key' => 'offset-albums'
);

$content = elgg_list_entities($taggedimages);
echo '<div id="gallery-tagged">';
echo $content;
echo '</div>';
