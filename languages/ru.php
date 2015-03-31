<?php
return array(
	'model' => 'Блог',
	'model:models' => 'Блоги',
	'model:revisions' => 'Редакции',
	'model:archives' => 'Архив',
	'model:model' => 'Блог',
	'item:object:model' => 'Блог',

	'model:title:user_models' => '%s\'s блог',
	'model:title:all_models' => 'Все блоги',
	'model:title:friends' => 'Блоги друзей',

	'model:group' => 'Блог группы',
	'model:enablemodel' => 'Включить блог группы',
	'model:write' => 'Написать сообщение',

	// Editing
	'model:add' => 'Написать сообщение',
	'model:edit' => 'Изменить',
	'model:excerpt' => 'Краткое описание',
	'model:body' => 'Сообщение',
	'model:save_status' => 'Сохранено: ',
	
	'model:revision' => 'Редакция',
	'model:auto_saved_revision' => 'Автосохраненная редакция',

	// messages
	'model:message:saved' => 'Сохранено.',
	'model:error:cannot_save' => 'Не могу сохранить сообщение.',
	'model:error:cannot_auto_save' => 'Не могу автоматически сохранить.',
	'model:error:cannot_write_to_container' => 'Нехватает прав для сохранения блога.',
	'model:messages:warning:draft' => 'Это не сохраненный черновик сообщения!',
	'model:edit_revision_notice' => '(Старая версия)',
	'model:message:deleted_post' => 'Сообщение удалено.',
	'model:error:cannot_delete_post' => 'Не могу удалить сообщение.',
	'model:none' => '---',
	'model:error:missing:title' => 'Пожалуйста, введите название!',
	'model:error:missing:description' => 'Пожалуйста, заполните сообщение!',
	'model:error:cannot_edit_post' => 'Извините, сообщение не существует или Вы не имеете прав для его редактирования.',
	'model:error:post_not_found' => 'Cannot find specified model post.',
	'model:error:revision_not_found' => 'Cannot find this revision.',

	// river
	'river:create:object:model' => '%s опубликовал(а) пост %s',
	'river:comment:object:model' => '%s комментировал(а) пост %s',

	// notifications
	'model:notify:summary' => 'Новая запись блога %s',
	'model:notify:subject' => 'Новая запись блога: %s',
	'model:notify:body' =>
'
%s добавил[а] новую запись в блог: %s

%s

Для просмотра и комментирования перейдите по ссылке:
%s
',

	// widget
	'model:widget:description' => 'Показать последние посты',
	'model:moremodels' => 'Показать больше постов',
	'model:numbertodisplay' => 'Число отображаемых постов',
	'model:nomodels' => 'Нет постов'
);