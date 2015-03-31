<?php
return array(
	'model' => 'Блогови',
	'model:models' => 'Блогови',
	'model:revisions' => 'Ревизије',
	'model:archives' => 'Архива',
	'model:model' => 'Блог',
	'item:object:model' => 'Блогови',

	'model:title:user_models' => '%s\'s блог',
	'model:title:all_models' => 'Сви блогови',
	'model:title:friends' => 'Блогови пријатеља',

	'model:group' => 'Блог групе',
	'model:enablemodel' => 'Укључи блог групе',
	'model:write' => 'Напиши блог чланак',

	// Editing
	'model:add' => 'Додај блог чланак',
	'model:edit' => 'Уреди блог чланак',
	'model:excerpt' => 'Издвојено',
	'model:body' => 'Текст',
	'model:save_status' => 'Задњи пут сачуваноЧ',
	
	'model:revision' => 'Ревизија',
	'model:auto_saved_revision' => 'Аутоматски сачувана ревизија',

	// messages
	'model:message:saved' => 'Блог чланак је сачуван.',
	'model:error:cannot_save' => 'Није успело чување чланка.',
	'model:error:cannot_auto_save' => 'Није успело аутоматско чување чланка.',
	'model:error:cannot_write_to_container' => 'Недовољне привилегије да би чланак био сачуван.',
	'model:messages:warning:draft' => 'Постоји несачуван нацрт овог чланка!',
	'model:edit_revision_notice' => '(Стара верзија)',
	'model:message:deleted_post' => 'Чланак је обрисан.',
	'model:error:cannot_delete_post' => 'Није успело брисање чланка.',
	'model:none' => 'Нема чланака.',
	'model:error:missing:title' => 'Унесите наслов чланка.',
	'model:error:missing:description' => 'Унесите текст вашег блога.',
	'model:error:cannot_edit_post' => 'Овај чланак мозда не постоји, а можда ви немате привилегије да га уређујете.',
	'model:error:post_not_found' => 'Не могу да нађем тражени чланак.',
	'model:error:revision_not_found' => 'Не могу да нађем ову ревизију.',

	// river
	'river:create:object:model' => '%s је објавио блог чланак %s',
	'river:comment:object:model' => '%s је коментарисао блог %s',

	// notifications
	'model:notify:summary' => 'Нови блог чланак %s',
	'model:notify:subject' => 'New блог чланак: %s',
	'model:notify:body' =>
'
%s је објавио нови блог чланак: %s

%s

Погледај и коментариши блог чланак:
%s
',

	// widget
	'model:widget:description' => 'Прикажи твоје најновије блог чланке',
	'model:moremodels' => 'Више блог чланака',
	'model:numbertodisplay' => 'Број блог чланака за приказ',
	'model:nomodels' => 'Нема блог чланака.'
);