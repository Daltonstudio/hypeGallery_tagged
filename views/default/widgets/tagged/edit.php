<?php
/**
 *
 * Tagged widget and gallery for HypeGallery
 * @author Daltonmedia - Daltonmedia.be
 *
*/
// set default value
if (!isset($vars['entity']->num_display)) {
	$vars['entity']->num_display = 24;
}

$params = array(
	'name' => 'params[num_display]',
	'value' => $vars['entity']->num_display,
	'options' => array(6, 12, 18, 24, 30),
);
$dropdown = elgg_view('input/dropdown', $params);

?>
<div>
	<?php echo elgg_echo('tagged:widget:edit:limit'); ?>:
	<?php echo $dropdown; ?>
</div>
