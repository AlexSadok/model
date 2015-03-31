<?php
return array(
	'model' => 'models',
	'model:models' => 'models',
	'model:revisions' => 'Révisions',
	'model:archives' => 'Archives',
	'model:model' => 'model',
	'item:object:model' => 'models',

	'model:title:user_models' => 'models de %s',
	'model:title:all_models' => 'Tous les models du site',
	'model:title:friends' => 'models des contacts',

	'model:group' => 'model du groupe',
	'model:enablemodel' => 'Activer le model du groupe',
	'model:write' => 'Écrire un article de model',

	// Editing
	'model:add' => 'Ajouter un article de model',
	'model:edit' => 'Modifier l\'article de model',
	'model:excerpt' => 'Extrait',
	'model:body' => 'Corps de l\'article',
	'model:save_status' => 'Dernier enregistrement:',
	
	'model:revision' => 'Révision',
	'model:auto_saved_revision' => 'Révision automatiquement enregistrée',

	// messages
	'model:message:saved' => 'Article de model enregistré.',
	'model:error:cannot_save' => 'Impossible d\'enregistrer l\'article de model.',
	'model:error:cannot_auto_save' => 'Impossible de sauvegarder automatiquement l\'article de model. ',
	'model:error:cannot_write_to_container' => 'Droits d\'accès insuffisants pour enregistrer l\'article pour ce groupe.',
	'model:messages:warning:draft' => 'Il y a un brouillon non enregistré de cet article !',
	'model:edit_revision_notice' => '(Ancienne version)',
	'model:message:deleted_post' => 'Article supprimé.',
	'model:error:cannot_delete_post' => 'Impossible de supprimer l\'article.',
	'model:none' => 'Aucun article de model',
	'model:error:missing:title' => 'Vous devez donner un titre à votre article !',
	'model:error:missing:description' => 'Le corps de votre article est vide !',
	'model:error:cannot_edit_post' => 'Cet article peut ne pas exister ou vous n\'avez pas les autorisations pour le modifier.',
	'model:error:post_not_found' => 'Impossible de trouver l\'article de model spécifié.',
	'model:error:revision_not_found' => 'Impossible de trouver cette révision.',

	// river
	'river:create:object:model' => '%s a publié un article de model %s',
	'river:comment:object:model' => '%s a commenté sur le model %s',

	// notifications
	'model:notify:summary' => 'Nouvel article de model nommé %s',
	'model:notify:subject' => 'Nouvel article de model: %s',
	'model:notify:body' =>
'
%s a publié un nouvel article de model: %s

%s

Voir et commenter cet article de model:
%s
',

	// widget
	'model:widget:description' => 'Ce widget affiche vos derniers articles de model',
	'model:moremodels' => 'Plus d\'articles de model',
	'model:numbertodisplay' => 'Nombre d\'articles de model à afficher',
	'model:nomodels' => 'Aucun article de model'
);