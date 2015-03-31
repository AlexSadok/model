<?php
return array(
	'model' => 'Bitácoras',
	'model:models' => 'Bitácoras',
	'model:revisions' => 'Revisións',
	'model:archives' => 'Arquivos',
	'model:model' => 'Bitácora',
	'item:object:model' => 'Bitácoras',

	'model:title:user_models' => 'Bitácoras de %s',
	'model:title:all_models' => 'Todas as bitácoras',
	'model:title:friends' => 'Bitácoras dos contactos',

	'model:group' => 'Bitácora do grupo',
	'model:enablemodel' => 'Activar a bitácora do grupo',
	'model:write' => 'Escribir un artigo',

	// Editing
	'model:add' => 'Engadir o artigo',
	'model:edit' => 'Editar o artigo',
	'model:excerpt' => 'Fragmento',
	'model:body' => 'Corp',
	'model:save_status' => 'Gardado:',
	
	'model:revision' => 'Revisión',
	'model:auto_saved_revision' => 'Revisión gardada automaticamente',

	// messages
	'model:message:saved' => 'Gardouse o artigo',
	'model:error:cannot_save' => 'Non foi posíbel gardar o artigo.',
	'model:error:cannot_auto_save' => 'Non pode gardarse automaticamente o artigo.',
	'model:error:cannot_write_to_container' => 'Non ten acceso dabondo para gardar a bitácora no grupo.',
	'model:messages:warning:draft' => 'Hai un borrador sen gardar deste artig!',
	'model:edit_revision_notice' => '(versión vella)',
	'model:message:deleted_post' => 'Eliminouse o artigo',
	'model:error:cannot_delete_post' => 'Non foi posíbel eliminar o artigo.',
	'model:none' => 'Non hai artigos.',
	'model:error:missing:title' => 'Escriba o nome da bitácora',
	'model:error:missing:description' => 'Escriba o corpo da bitácora.',
	'model:error:cannot_edit_post' => 'Pode que o artigo non exista ou que vostede non teña os permisos necesarios para acceder a el.',
	'model:error:post_not_found' => 'Non foi posíbel atopar o artigo indicado',
	'model:error:revision_not_found' => 'Non é posíbel atopar esta revisión.',

	// river
	'river:create:object:model' => '%s publicou un artigo %s',
	'river:comment:object:model' => '%s deixou un comentario na bitácora %s',

	// notifications
	'model:notify:summary' => 'Novo artigo: «%s»',
	'model:notify:subject' => 'Novo artigo: «%s»',
	'model:notify:body' =>
'
%s publicou un novo artigo: %s

%s

Véxao e deixe un comentario desde:
%s
',

	// widget
	'model:widget:description' => 'Mostrar os seus últimos artigos',
	'model:moremodels' => 'Máis artigos',
	'model:numbertodisplay' => 'Número de artigos para mostrar.',
	'model:nomodels' => 'Non hai artigos.'
);