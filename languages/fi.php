<?php
return array(
	'model' => 'modelit',
	'model:models' => 'modelit',
	'model:revisions' => 'Versiot',
	'model:archives' => 'Arkisto',
	'model:model' => 'modeli',
	'item:object:model' => 'modelit',

	'model:title:user_models' => 'Käyttäjän %s modelit',
	'model:title:all_models' => 'Kaikki modelit',
	'model:title:friends' => 'Ystävien modelit',

	'model:group' => 'Ryhmän modeli',
	'model:enablemodel' => 'Ota käyttöön ryhmän modeli',
	'model:write' => 'Lisää modeliviesti',

	// Editing
	'model:add' => 'Luo uusi modeliviesti',
	'model:edit' => 'Muokkaa modeliviestiä',
	'model:excerpt' => 'Tiivistelmä',
	'model:body' => 'Viesti',
	'model:save_status' => 'Tallennettu viimeksi: ',
	
	'model:revision' => 'Versio',
	'model:auto_saved_revision' => 'Versio  Auto Saved Revision',

	// messages
	'model:message:saved' => 'modeli tallennettu.',
	'model:error:cannot_save' => 'modeliviestiä ei voida tallentaa.',
	'model:error:cannot_auto_save' => 'modelin automaattinen tallentaminen ei toimi.',
	'model:error:cannot_write_to_container' => 'Sinulla ei ole oikeuksia luoda modelia tähän ryhmään.',
	'model:messages:warning:draft' => 'Tästä modeliviestistä on tallentamaton luonnos!',
	'model:edit_revision_notice' => '(Vanha versio)',
	'model:message:deleted_post' => 'modeliviesti poistettu.',
	'model:error:cannot_delete_post' => 'modeliviestiä ei voida poistaa.',
	'model:none' => 'Ei modeliviestejä',
	'model:error:missing:title' => 'Syötä modelille otsikko!',
	'model:error:missing:description' => 'Syötä modeliviestin sisältö!',
	'model:error:cannot_edit_post' => 'Tämä modeliviesti on saatettu poistaa tai sinulla ei ole oikeuksia sen muokkaamiseen.',
	'model:error:post_not_found' => 'modeliviestiä ei löydy.',
	'model:error:revision_not_found' => 'Versiota ei löydy.',

	// river
	'river:create:object:model' => '%s julkaisi modeliviestin %s',
	'river:comment:object:model' => '%s kommentoi modeliviestiä %s',

	// notifications
	'model:notify:summary' => 'Uusi modeliviesti %s',
	'model:notify:subject' => 'Uusi modeliviesti: %s',
	'model:notify:body' =>
'
%s julkaisi uuden modelikirjoituksen: %s

%s

Voit lukea modelikirjoituksen täällä:
%s
',

	// widget
	'model:widget:description' => 'Näytä viimeisimmät modeliviestisi',
	'model:moremodels' => 'Lisää modeliviestejä',
	'model:numbertodisplay' => 'Näytettävien kohteiden määrä',
	'model:nomodels' => 'Ei modeliviestejä'
);