<?php
/**
 * models
 *
 * @package model
 *
 * @todo
 * - Either drop support for "publish date" or duplicate more entity getter
 * functions to work with a non-standard time_created.
 * - Pingbacks
 * - Notifications
 * - River entry for posts saved as drafts and later published
 */

elgg_register_event_handler('init', 'system', 'model_init');

/**
 * Init model plugin.
 */

function model_init() {

	elgg_register_library('elgg:model', elgg_get_plugins_path() . 'model/lib/model.php');

	// add a site navigation item
	$item = new ElggMenuItem('model', elgg_echo('model:models'), 'model/all');
	elgg_register_menu_item('site', $item);

	elgg_register_event_handler('upgrade', 'upgrade', 'model_run_upgrades');

	// add to the main css
	elgg_extend_view('css/elgg', 'model/css');

	// routing of urls
	elgg_register_page_handler('model', 'model_page_handler');

	// override the default url to view a model object
	elgg_register_plugin_hook_handler('entity:url', 'object', 'model_set_url');

	// notifications
	elgg_register_notification_event('object', 'model', array('publish'));
	elgg_register_plugin_hook_handler('prepare', 'notification:publish:object:model', 'model_prepare_notification');

	// add model link to
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'model_owner_block_menu');

	// pingbacks
	//elgg_register_event_handler('create', 'object', 'model_incoming_ping');
	//elgg_register_plugin_hook_handler('pingback:object:subtypes', 'object', 'model_pingback_subtypes');

	// Register for search.
	elgg_register_entity_type('object', 'model');

	// Add group option
	add_group_tool_option('model', elgg_echo('model:enablemodel'), true);
	elgg_extend_view('groups/tool_latest', 'model/group_module');

	// add a model widget
	elgg_register_widget_type('model', elgg_echo('model'), elgg_echo('model:widget:description'));

	// register actions
	$action_path = elgg_get_plugins_path() . 'model/actions/model';
	elgg_register_action('model/save', "$action_path/save.php");
	elgg_register_action('model/auto_save_revision', "$action_path/auto_save_revision.php");
	elgg_register_action('model/delete', "$action_path/delete.php");

	// entity menu
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'model_entity_menu_setup');

	// ecml
	elgg_register_plugin_hook_handler('get_views', 'ecml', 'model_ecml_views_hook');
}

/**
 * Dispatches model pages.
 * URLs take the form of
 *  All models:       model/all
 *  User's models:    model/owner/<username>
 *  Friends' model:   model/friends/<username>
 *  User's archives: model/archives/<username>/<time_start>/<time_stop>
 *  model post:       model/view/<guid>/<title>
 *  New post:        model/add/<guid>
 *  Edit post:       model/edit/<guid>/<revision>
 *  Preview post:    model/preview/<guid>
 *  Group model:      model/group/<guid>/all
 *
 * Title is ignored
 *
 * @todo no archives for all models or friends
 *
 * @param array $page
 * @return bool
 */
function model_page_handler($page) {

	elgg_load_library('elgg:model');

	// push all models breadcrumb
	elgg_push_breadcrumb(elgg_echo('model:models'), "model/all");

	if (!isset($page[0])) {
		$page[0] = 'all';
	}

	$page_type = $page[0];
	switch ($page_type) {
		case 'owner':
			$user = get_user_by_username($page[1]);
			if (!$user) {
				forward('', '404');
			}
			$params = model_get_page_content_list($user->guid);
			break;
		case 'friends':
			$user = get_user_by_username($page[1]);
			if (!$user) {
				forward('', '404');
			}
			$params = model_get_page_content_friends($user->guid);
			break;
		case 'archive':
			$user = get_user_by_username($page[1]);
			if (!$user) {
				forward('', '404');
			}
			$params = model_get_page_content_archive($user->guid, $page[2], $page[3]);
			break;
		case 'view':
			$params = model_get_page_content_read($page[1]);
			break;
		case 'add':
			elgg_gatekeeper();
			$params = model_get_page_content_edit($page_type, $page[1]);
			break;
		case 'edit':
			elgg_gatekeeper();
			$params = model_get_page_content_edit($page_type, $page[1], $page[2]);
			break;
		case 'group':
			$group = get_entity($page[1]);
			if (!elgg_instanceof($group, 'group')) {
				forward('', '404');
			}
			if (!isset($page[2]) || $page[2] == 'all') {
				$params = model_get_page_content_list($page[1]);
			} else {
				$params = model_get_page_content_archive($page[1], $page[3], $page[4]);
			}
			break;
		case 'all':
			$params = model_get_page_content_list();
			break;
		default:
			return false;
	}

	if (isset($params['sidebar'])) {
		$params['sidebar'] .= elgg_view('model/sidebar', array('page' => $page_type));
	} else {
		$params['sidebar'] = elgg_view('model/sidebar', array('page' => $page_type));
	}

	$body = elgg_view_layout('content', $params);

	echo elgg_view_page($params['title'], $body);
	return true;
}

/**
 * Format and return the URL for models.
 *
 * @param string $hook
 * @param string $type
 * @param string $url
 * @param array  $params
 * @return string URL of model.
 */
function model_set_url($hook, $type, $url, $params) {
	$entity = $params['entity'];
	if (elgg_instanceof($entity, 'object', 'model')) {
		$friendly_title = elgg_get_friendly_title($entity->title);
		return "model/view/{$entity->guid}/$friendly_title";
	}
}

/**
 * Add a menu item to an ownerblock
 */
function model_owner_block_menu($hook, $type, $return, $params) {
	if (elgg_instanceof($params['entity'], 'user')) {
		$url = "model/owner/{$params['entity']->username}";
		$item = new ElggMenuItem('model', elgg_echo('model'), $url);
		$return[] = $item;
	} else {
		if ($params['entity']->model_enable != "no") {
			$url = "model/group/{$params['entity']->guid}/all";
			$item = new ElggMenuItem('model', elgg_echo('model:group'), $url);
			$return[] = $item;
		}
	}

	return $return;
}

/**
 * Add particular model links/info to entity menu
 */
function model_entity_menu_setup($hook, $type, $return, $params) {
	if (elgg_in_context('widgets')) {
		return $return;
	}

	$entity = $params['entity'];
	$handler = elgg_extract('handler', $params, false);
	if ($handler != 'model') {
		return $return;
	}

	if ($entity->status != 'published') {
		// draft status replaces access
		foreach ($return as $index => $item) {
			if ($item->getName() == 'access') {
				unset($return[$index]);
			}
		}

		$status_text = elgg_echo("status:{$entity->status}");
		$options = array(
			'name' => 'published_status',
			'text' => "<span>$status_text</span>",
			'href' => false,
			'priority' => 150,
		);
		$return[] = ElggMenuItem::factory($options);
	}

	return $return;
}

/**
 * Prepare a notification message about a published model
 *
 * @param string                          $hook         Hook name
 * @param string                          $type         Hook type
 * @param Elgg\Notifications\Notification $notification The notification to prepare
 * @param array                           $params       Hook parameters
 * @return Elgg\Notifications\Notification
 */
function model_prepare_notification($hook, $type, $notification, $params) {
	$entity = $params['event']->getObject();
	$owner = $params['event']->getActor();
	$recipient = $params['recipient'];
	$language = $params['language'];
	$method = $params['method'];

	$notification->subject = elgg_echo('model:notify:subject', array($entity->title), $language);
	$notification->body = elgg_echo('model:notify:body', array(
		$owner->name,
		$entity->title,
		$entity->getExcerpt(),
		$entity->getURL()
	), $language);
	$notification->summary = elgg_echo('model:notify:summary', array($entity->title), $language);

	return $notification;
}

/**
 * Register models with ECML.
 */
function model_ecml_views_hook($hook, $entity_type, $return_value, $params) {
	$return_value['object/model'] = elgg_echo('model:models');

	return $return_value;
}

/**
 * Upgrade from 1.7 to 1.8.
 */
function model_run_upgrades($event, $type, $details) {
	$model_upgrade_version = elgg_get_plugin_setting('upgrade_version', 'models');

	if (!$model_upgrade_version) {
		 // When upgrading, check if the Elggmodel class has been registered as this
		 // was added in Elgg 1.8
		if (!update_subtype('object', 'model', 'Elggmodel')) {
			add_subtype('object', 'model', 'Elggmodel');
		}

		elgg_set_plugin_setting('upgrade_version', 1, 'models');
	}
}
