<?php
/**
 * model sidebar
 *
 * @package model
 */

// fetch & display latest comments
if ($vars['page'] == 'all') {
	echo elgg_view('page/elements/comments_block', array(
		'subtypes' => 'model',
	));
} elseif ($vars['page'] == 'owner') {
	echo elgg_view('page/elements/comments_block', array(
		'subtypes' => 'model',
		'owner_guid' => elgg_get_page_owner_guid(),
	));
}

// only users can have archives at present
if ($vars['page'] == 'owner' || $vars['page'] == 'group') {
	echo elgg_view('model/sidebar/archives', $vars);
}

if ($vars['page'] != 'friends') {
	echo elgg_view('page/elements/tagcloud_block', array(
		'subtypes' => 'model',
		'owner_guid' => elgg_get_page_owner_guid(),
	));
}
