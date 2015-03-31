<?php
return array(
	'model' => 'models',
	'model:models' => 'models',
	'model:revisions' => 'Revisions',
	'model:archives' => 'Archives',
	'model:model' => 'model',
	'item:object:model' => 'models',

	'model:title:user_models' => '%s\'s models',
	'model:title:all_models' => 'All site models',
	'model:title:friends' => 'Friends\' models',

	'model:group' => 'Group model',
	'model:enablemodel' => 'Enable group model',
	'model:write' => 'Write a model post',

	// Editing
	'model:add' => 'Add model post',
	'model:edit' => 'Edit model post',
	'model:excerpt' => 'Excerpt',
	'model:body' => 'Body',
	'model:save_status' => 'Last saved: ',
	
	'model:revision' => 'Revision',
	'model:auto_saved_revision' => 'Auto Saved Revision',

	// messages
	'model:message:saved' => 'model post saved.',
	'model:error:cannot_save' => 'Cannot save model post.',
	'model:error:cannot_auto_save' => 'Cannot automatically save model post.',
	'model:error:cannot_write_to_container' => 'Insufficient access to save model to group.',
	'model:messages:warning:draft' => 'There is an unsaved draft of this post!',
	'model:edit_revision_notice' => '(Old version)',
	'model:message:deleted_post' => 'model post deleted.',
	'model:error:cannot_delete_post' => 'Cannot delete model post.',
	'model:none' => 'No model posts',
	'model:error:missing:title' => 'Please enter a model title!',
	'model:error:missing:description' => 'Please enter the body of your model!',
	'model:error:cannot_edit_post' => 'This post may not exist or you may not have permissions to edit it.',
	'model:error:post_not_found' => 'Cannot find specified model post.',
	'model:error:revision_not_found' => 'Cannot find this revision.',

	// river
	'river:create:object:model' => '%s published a model post %s',
	'river:comment:object:model' => '%s commented on the model %s',

	// notifications
	'model:notify:summary' => 'New model post called %s',
	'model:notify:subject' => 'New model post: %s',
	'model:notify:body' =>
'
%s published a new model post: %s

%s

View and comment on the model post:
%s
',

	// widget
	'model:widget:description' => 'Display your latest model posts',
	'model:moremodels' => 'More model posts',
	'model:numbertodisplay' => 'Number of model posts to display',
	'model:nomodels' => 'No model posts'
);