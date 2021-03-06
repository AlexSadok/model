<?php
/**
 * model helper functions
 *
 * @package model
 */


/**
 * Get page components to view a model post.
 *
 * @param int $guid GUID of a model entity.
 * @return array
 */
function model_get_page_content_read($guid = NULL) {

	$return = array();

	elgg_entity_gatekeeper($guid, 'object', 'model');

	$model = get_entity($guid);

	// no header or tabs for viewing an individual model
	$return['filter'] = '';

	elgg_set_page_owner_guid($model->container_guid);

	elgg_group_gatekeeper();

	$return['title'] = $model->title;

	$container = $model->getContainerEntity();
	$crumbs_title = $container->name;
	if (elgg_instanceof($container, 'group')) {
		elgg_push_breadcrumb($crumbs_title, "model/group/$container->guid/all");
	} else {
		elgg_push_breadcrumb($crumbs_title, "model/owner/$container->username");
	}

	elgg_push_breadcrumb($model->title);
	$return['content'] = elgg_view_entity($model, array('full_view' => true));
	// check to see if we should allow comments
	if ($model->comments_on != 'Off' && $model->status == 'published') {
		$return['content'] .= elgg_view_comments($model);
	}

	return $return;
}

/**
 * Get page components to list a user's or all models.
 *
 * @param int $container_guid The GUID of the page owner or NULL for all models
 * @return array
 */
function model_get_page_content_list($container_guid = NULL) {

	$return = array();

	$return['filter_context'] = $container_guid ? 'mine' : 'all';

	$options = array(
		'type' => 'object',
		'subtype' => 'model',
		'full_view' => false,
		'no_results' => elgg_echo('model:none'),
		'preload_owners' => true,
		'distinct' => false,
	);

	$current_user = elgg_get_logged_in_user_entity();

	if ($container_guid) {
		// access check for closed groups
		elgg_group_gatekeeper();

		$options['container_guid'] = $container_guid;
		$container = get_entity($container_guid);
		if (!$container) {

		}
		$return['title'] = elgg_echo('model:title:user_models', array($container->name));

		$crumbs_title = $container->name;
		elgg_push_breadcrumb($crumbs_title);

		if ($current_user && ($container_guid == $current_user->guid)) {
			$return['filter_context'] = 'mine';
		} else if (elgg_instanceof($container, 'group')) {
			$return['filter'] = false;
		} else {
			// do not show button or select a tab when viewing someone else's posts
			$return['filter_context'] = 'none';
		}
	} else {
		$return['filter_context'] = 'all';
		$return['title'] = elgg_echo('model:title:all_models');
		elgg_pop_breadcrumb();
		elgg_push_breadcrumb(elgg_echo('model:models'));
	}

	elgg_register_title_button();

	$return['content'] = elgg_list_entities($options);

	return $return;
}

/**
 * Get page components to list of the user's friends' posts.
 *
 * @param int $user_guid
 * @return array
 */
function model_get_page_content_friends($user_guid) {

	$user = get_user($user_guid);
	if (!$user) {
		forward('model/all');
	}

	$return = array();

	$return['filter_context'] = 'friends';
	$return['title'] = elgg_echo('model:title:friends');

	$crumbs_title = $user->name;
	elgg_push_breadcrumb($crumbs_title, "model/owner/{$user->username}");
	elgg_push_breadcrumb(elgg_echo('friends'));

	elgg_register_title_button();

	$options = array(
		'type' => 'object',
		'subtype' => 'model',
		'full_view' => false,
		'relationship' => 'friend',
		'relationship_guid' => $user_guid,
		'relationship_join_on' => 'container_guid',
		'no_results' => elgg_echo('model:none'),
		'preload_owners' => true,
	);

	$return['content'] = elgg_list_entities_from_relationship($options);

	return $return;
}

/**
 * Get page components to show models with publish dates between $lower and $upper
 *
 * @param int $owner_guid The GUID of the owner of this page
 * @param int $lower      Unix timestamp
 * @param int $upper      Unix timestamp
 * @return array
 */
function model_get_page_content_archive($owner_guid, $lower = 0, $upper = 0) {

	$owner = get_entity($owner_guid);
	elgg_set_page_owner_guid($owner_guid);

	$crumbs_title = $owner->name;
	if (elgg_instanceof($owner, 'user')) {
		$url = "model/owner/{$owner->username}";
	} else {
		$url = "model/group/$owner->guid/all";
	}
	elgg_push_breadcrumb($crumbs_title, $url);
	elgg_push_breadcrumb(elgg_echo('model:archives'));

	if ($lower) {
		$lower = (int)$lower;
	}

	if ($upper) {
		$upper = (int)$upper;
	}

	$options = array(
		'type' => 'object',
		'subtype' => 'model',
		'full_view' => false,
		'no_results' => elgg_echo('model:none'),
		'preload_owners' => true,
		'distinct' => false,
	);

	if ($owner_guid) {
		$options['container_guid'] = $owner_guid;
	}

	if ($lower) {
		$options['created_time_lower'] = $lower;
	}

	if ($upper) {
		$options['created_time_upper'] = $upper;
	}

	$content = elgg_list_entities($options);

	$title = elgg_echo('date:month:' . date('m', $lower), array(date('Y', $lower)));

	return array(
		'content' => $content,
		'title' => $title,
		'filter' => '',
	);
}

/**
 * Get page components to edit/create a model post.
 *
 * @param string  $page     'edit' or 'new'
 * @param int     $guid     GUID of model post or container
 * @param int     $revision Annotation id for revision to edit (optional)
 * @return array
 */
function model_get_page_content_edit($page, $guid = 0, $revision = NULL) {

	elgg_require_js('elgg/model/save_draft');

	$return = array(
		'filter' => '',
	);

	$vars = array();
	$vars['id'] = 'model-post-edit';
	$vars['class'] = 'elgg-form-alt';

	$sidebar = '';
	if ($page == 'edit') {
		$model = get_entity((int)$guid);

		$title = elgg_echo('model:edit');

		if (elgg_instanceof($model, 'object', 'model') && $model->canEdit()) {
			$vars['entity'] = $model;

			$title .= ": \"$model->title\"";

			if ($revision) {
				$revision = elgg_get_annotation_from_id((int)$revision);
				$vars['revision'] = $revision;
				$title .= ' ' . elgg_echo('model:edit_revision_notice');

				if (!$revision || !($revision->entity_guid == $guid)) {
					$content = elgg_echo('model:error:revision_not_found');
					$return['content'] = $content;
					$return['title'] = $title;
					return $return;
				}
			}

			$body_vars = model_prepare_form_vars($model, $revision);

			elgg_push_breadcrumb($model->title, $model->getURL());
			elgg_push_breadcrumb(elgg_echo('edit'));
			
			elgg_require_js('elgg/model/save_draft');

			$content = elgg_view_form('model/save', $vars, $body_vars);
			$sidebar = elgg_view('model/sidebar/revisions', $vars);
		} else {
			$content = elgg_echo('model:error:cannot_edit_post');
		}
	} else {
		elgg_push_breadcrumb(elgg_echo('model:add'));
		$body_vars = model_prepare_form_vars(null);

		$title = elgg_echo('model:add');
		$content = elgg_view_form('model/save', $vars, $body_vars);
	}

	$return['title'] = $title;
	$return['content'] = $content;
	$return['sidebar'] = $sidebar;
	return $return;
}

/**
 * Pull together model variables for the save form
 *
 * @param ElggModel       $post
 * @param ElggAnnotation $revision
 * @return array
 */
function model_prepare_form_vars($post = NULL, $revision = NULL) {

	// input names => defaults
	$values = array(
		'title' => NULL,
		'description' => NULL,
		'status' => 'published',
		'access_id' => ACCESS_DEFAULT,
		'comments_on' => 'On',
		'excerpt' => NULL,
		'tags' => NULL,
		'container_guid' => NULL,
		'guid' => NULL,
		'draft_warning' => '',
	);

	if ($post) {
		foreach (array_keys($values) as $field) {
			if (isset($post->$field)) {
				$values[$field] = $post->$field;
			}
		}

		if ($post->status == 'draft') {
			$values['access_id'] = $post->future_access;
		}
	}

	if (elgg_is_sticky_form('model')) {
		$sticky_values = elgg_get_sticky_values('model');
		foreach ($sticky_values as $key => $value) {
			$values[$key] = $value;
		}
	}
	
	elgg_clear_sticky_form('model');

	if (!$post) {
		return $values;
	}

	// load the revision annotation if requested
	if ($revision instanceof ElggAnnotation && $revision->entity_guid == $post->getGUID()) {
		$values['revision'] = $revision;
		$values['description'] = $revision->value;
	}

	// display a notice if there's an autosaved annotation
	// and we're not editing it.
	$auto_save_annotations = $post->getAnnotations(array(
		'annotation_name' => 'model_auto_save',
		'limit' => 1,
	));
	if ($auto_save_annotations) {
		$auto_save = $auto_save_annotations[0];
	} else {
		$auto_save = false;
	}

	if ($auto_save && $auto_save->id != $revision->id) {
		$values['draft_warning'] = elgg_echo('model:messages:warning:draft');
	}

	return $values;
}
