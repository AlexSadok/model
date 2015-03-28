<?php
/**
 * model sidebar menu showing revisions
 *
 * @package model
 */

//If editing a post, show the previous revisions and drafts.
$model = elgg_extract('entity', $vars, FALSE);

if (elgg_instanceof($model, 'object', 'model') && $model->canEdit()) {
	$owner = $model->getOwnerEntity();
	$revisions = array();

	$auto_save_annotations = $model->getAnnotations(array(
		'annotation_name' => 'model_auto_save',
		'limit' => 1,
	));
	if ($auto_save_annotations) {
		$revisions[] = $auto_save_annotations[0];
	}

	// count(FALSE) == 1!  AHHH!!!
	$saved_revisions = $model->getAnnotations(array(
		'annotation_name' => 'model_revision',
		'reverse_order_by' => true,
	));
	if ($saved_revisions) {
		$revision_count = count($saved_revisions);
	} else {
		$revision_count = 0;
	}

	$revisions = array_merge($revisions, $saved_revisions);

	if ($revisions) {
		$title = elgg_echo('model:revisions');

		$n = count($revisions);
		$body = '<ul class="model-revisions">';

		$load_base_url = "model/edit/{$model->getGUID()}";

		// show the "published revision"
		if ($model->status == 'published') {
			$load = elgg_view('output/url', array(
				'href' => $load_base_url,
				'text' => elgg_echo('status:published'),
				'is_trusted' => true,
			));

			$time = "<span class='elgg-subtext'>"
				. elgg_view_friendly_time($model->time_created) . "</span>";

			$body .= "<li>$load : $time</li>";
		}

		foreach ($revisions as $revision) {
			$time = "<span class='elgg-subtext'>"
				. elgg_view_friendly_time($revision->time_created) . "</span>";

			if ($revision->name == 'model_auto_save') {
				$revision_lang = elgg_echo('model:auto_saved_revision');
			} else {
				$revision_lang = elgg_echo('model:revision') . " $n";
			}
			$load = elgg_view('output/url', array(
				'href' => "$load_base_url/$revision->id",
				'text' => $revision_lang,
				'is_trusted' => true,
			));

			$text = "$load: $time";
			$class = 'class="auto-saved"';

			$n--;

			$body .= "<li $class>$text</li>";
		}

		$body .= '</ul>';

		echo elgg_view_module('aside', $title, $body);
	}
}