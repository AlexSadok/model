<?php
return array(
	'model' => 'Blocs',
	'model:models' => 'Blocs',
	'model:revisions' => 'Revisions',
	'model:archives' => 'Arxius',
	'model:model' => 'Bloc',
	'item:object:model' => 'Entrades del bloc',

	'model:title:user_models' => 'Bloc de %s',
	'model:title:all_models' => 'Tots els blocs',
	'model:title:friends' => 'Blocs d\'amics',

	'model:group' => 'Bloc del grup',
	'model:enablemodel' => 'Activar el bloc del grup',
	'model:write' => 'Afegir una entrada al bloc',

	// Editing
	'model:add' => 'Afegir una entrada al bloc',
	'model:edit' => 'Editar entrada del bloc',
	'model:excerpt' => 'Extracte',
	'model:body' => 'Cos',
	'model:save_status' => 'Desat: ',
	
	'model:revision' => 'Revisió',
	'model:auto_saved_revision' => 'Revisió desada automàticament',

	// messages
	'model:message:saved' => 'Entrada del bloc desada.',
	'model:error:cannot_save' => 'No s\'ha pogut desar l\'entrada del bloc.',
	'model:error:cannot_auto_save' => 'No es pot desar el post de bloc automàticament.',
	'model:error:cannot_write_to_container' => 'No tens els permisos necessaris per afegir el bloc al grup.',
	'model:messages:warning:draft' => 'Hi ha un esborrany sense desar per aquesta entrada!',
	'model:edit_revision_notice' => '(Versió anterior)',
	'model:message:deleted_post' => 'Entrada del bloc eliminada.',
	'model:error:cannot_delete_post' => 'No s\'ha pogut eliminar l\'entrada del bloc.',
	'model:none' => 'No hi ha cap entrada al bloc',
	'model:error:missing:title' => 'siusplau, entra un títol per al bloc!',
	'model:error:missing:description' => 'Siusplau, afegeix el cos del teu bloc!',
	'model:error:cannot_edit_post' => 'La publicació no existeix o no tens els permisos necessaris per modificar-la.',
	'model:error:post_not_found' => 'No ha estat possible trobar l\'entrade de bloc especificada.',
	'model:error:revision_not_found' => 'No s\'ha pogut trobar la revisió.',

	// river
	'river:create:object:model' => '%s ha publicat una entrada al bloc %s',
	'river:comment:object:model' => '%s ha comentat  en el bloc %s',

	// notifications
	'model:notify:summary' => 'Nou missatge de bloc anomenat %s',
	'model:notify:subject' => 'Nou post de bloc: %s',
	'model:notify:body' =>
'
%s ha escrit un nou missatge del bloc.

%s
%s

Veure i comentar el nou missatge:
%s
',

	// widget
	'model:widget:description' => 'Aquest giny mostra les darreres entrades al bloc.',
	'model:moremodels' => 'Més entrades',
	'model:numbertodisplay' => 'Nombre d\'entrades del bloc a mostrar',
	'model:nomodels' => 'No hi ha entrades del bloc'
);