<?php
/**
 * Action called by AJAX periodic auto saving when editing.
 *
 * @package model
 */

$guid = get_input('guid');
$user = elgg_get_logged_in_user_entity();
$title = htmlspecialchars(get_input('title', '', false), ENT_QUOTES, 'UTF-8');
$description = get_input('description');
$excerpt = get_input('excerpt');

// because get_input() doesn't use the default if the input is ''
if (empty($excerpt)) {
	$excerpt = $description;
}

// store errors to pass along
$error = FALSE;

if ($title && $description) {

	if ($guid) {
		$entity = get_entity($guid);
		if (elgg_instanceof($entity, 'object', 'model') && $entity->canEdit()) {
			$model = $entity;
		} else {
			$error = elgg_echo('model:error:post_not_found');
		}
	} else {
		$model = new Elggmodel();
		$model->subtype = 'model';

		// force draft and private for autosaves.
		$model->status = 'unsaved_draft';
		$model->access_id = ACCESS_PRIVATE;
		$model->title = $title;
		$model->description = $description;
		$model->excerpt = elgg_get_excerpt($excerpt);

		// mark this as a brand new post so we can work out the
		// river / revision logic in the real save action.
		$model->new_post = TRUE;

		if (!$model->save()) {
			$error = elgg_echo('model:error:cannot_save');
		}
	}

	// creat draft annotation
	if (!$error) {
		// annotations don't have a "time_updated" so
		// we have to delete everything or the times are wrong.

		// don't save if nothing changed
		$auto_save_annotations = $model->getAnnotations(array(
			'annotation_name' => 'model_auto_save',
			'limit' => 1,
		));
		if ($auto_save_annotations) {
			$auto_save = $auto_save_annotations[0];
		} else {
			$auto_save = FALSE;
		}

		if (!$auto_save) {
			$annotation_id = $model->annotate('model_auto_save', $description);
		} elseif ($auto_save instanceof ElggAnnotation && $auto_save->value != $description) {
			$model->deleteAnnotations('model_auto_save');
			$annotation_id = $model->annotate('model_auto_save', $description);
		} elseif ($auto_save instanceof ElggAnnotation && $auto_save->value == $description) {
			// this isn't an error because we have an up to date annotation.
			$annotation_id = $auto_save->id;
		}

		if (!$annotation_id) {
			$error = elgg_echo('model:error:cannot_auto_save');
		}
	}
} else {
	$error = elgg_echo('model:error:missing:description');
}

if ($error) {
	$json = array('success' => FALSE, 'message' => $error);
	echo json_encode($json);
} else {
	$msg = elgg_echo('model:message:saved');
	$json = array('success' => TRUE, 'message' => $msg, 'guid' => $model->getGUID());
	echo json_encode($json);
}
exit;
