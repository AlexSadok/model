<?php
return array(
	'model' => 'models',
	'model:models' => 'models',
	'model:revisions' => 'Revisões',
	'model:archives' => 'Arquivos',
	'model:model' => 'model',
	'item:object:model' => 'models',

	'model:title:user_models' => '%s\'s models',
	'model:title:all_models' => 'Todos os models do site',
	'model:title:friends' => 'models dos amigos',

	'model:group' => 'model do grupo',
	'model:enablemodel' => 'Ativar model para o grupo',
	'model:write' => 'Postar no model',

	// Editing
	'model:add' => 'Adicionar uma postagem no model',
	'model:edit' => 'Editar a postagem do model',
	'model:excerpt' => 'Resumo',
	'model:body' => 'Texto',
	'model:save_status' => 'Última alteração:',
	
	'model:revision' => 'Revisão',
	'model:auto_saved_revision' => 'Revisão do salvamento automático',

	// messages
	'model:message:saved' => 'A postagem do model foi salva.',
	'model:error:cannot_save' => 'Não foi possível salvar a postagem do model.',
	'model:error:cannot_auto_save' => 'Não foi possível salvar automaticamente a postagem do model.',
	'model:error:cannot_write_to_container' => 'Acesso insuficiente para salvar um model no grupo.',
	'model:messages:warning:draft' => 'Existe um rascunho dessa postagem sem  salvar. ',
	'model:edit_revision_notice' => '(Versão anterior)',
	'model:message:deleted_post' => 'A postagem do model foi excluída.',
	'model:error:cannot_delete_post' => 'Não foi possível excluir a postagem do model.',
	'model:none' => 'Não existem postagens nesse model.',
	'model:error:missing:title' => 'Por favor, insira um título do model!',
	'model:error:missing:description' => 'Por favor, insira o texto do model!',
	'model:error:cannot_edit_post' => 'Essa postagem não existe ou você não tem permissão para editá-la.',
	'model:error:post_not_found' => 'Não foi possível encontrar a postagem de model especificada.',
	'model:error:revision_not_found' => 'Não foi possível encontrar esta revisão.',

	// river
	'river:create:object:model' => '%s publicou um postagem no model %s',
	'river:comment:object:model' => '%s comentou no model %s',

	// notifications
	'model:notify:summary' => 'Nova postagem no model chamado %s',
	'model:notify:subject' => 'Nova postagem de model: %s',
	'model:notify:body' =>
'
%s publicou uma nova postagem no model: %s

%s

Ver e comentar sobre postagem do model:
%s
',

	// widget
	'model:widget:description' => 'Mostrar suas últimas postagens do model',
	'model:moremodels' => 'Mais postagens do model',
	'model:numbertodisplay' => 'Número de postagens para exibir',
	'model:nomodels' => 'Não existem postagens do model'
);