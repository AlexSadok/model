<?php
/**
 * Delete model entity
 *
 * @package model
 */

$model_guid = get_input('guid');
$model = get_entity($model_guid);

if (elgg_instanceof($model, 'object', 'model') && $model->canEdit()) {
	$container = get_entity($model->container_guid);
	if ($model->delete()) {
		system_message(elgg_echo('model:message:deleted_post'));
		if (elgg_instanceof($container, 'group')) {
			forward("model/group/$container->guid/all");
		} else {
			forward("model/owner/$container->username");
		}
	} else {
		register_error(elgg_echo('model:error:cannot_delete_post'));
	}
} else {
	register_error(elgg_echo('model:error:post_not_found'));
}

forward(REFERER);