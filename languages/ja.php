<?php
return array(
	'model' => 'ブログ',
	'model:models' => 'ブログ',
	'model:revisions' => '変更履歴',
	'model:archives' => '書庫',
	'model:model' => 'ブログ',
	'item:object:model' => 'ブログ',

	'model:title:user_models' => '%s さんのブログ',
	'model:title:all_models' => 'サイトの全ブログ',
	'model:title:friends' => '友達のブログ',

	'model:group' => 'グループブログ',
	'model:enablemodel' => 'グループブログを使えるようにする',
	'model:write' => 'ブログに投稿する',

	// Editing
	'model:add' => 'ブログ記事を追加',
	'model:edit' => 'ブログ記事を編集',
	'model:excerpt' => '見出し',
	'model:body' => '本文',
	'model:save_status' => '最後に保存:',
	
	'model:revision' => '変更履歴',
	'model:auto_saved_revision' => '自動保存された変更履歴',

	// messages
	'model:message:saved' => 'ブログ記事を保存しました。',
	'model:error:cannot_save' => 'ブログ記事を保存できませんでした。',
	'model:error:cannot_auto_save' => 'ブログ記事を自動的に保存出来ません。',
	'model:error:cannot_write_to_container' => 'あなたの権限ではグループにブログを保存する事はできません。',
	'model:messages:warning:draft' => '保存されていない下書きの記事があります！',
	'model:edit_revision_notice' => '(前の版)',
	'model:message:deleted_post' => 'ブログ記事を削除しました。',
	'model:error:cannot_delete_post' => 'ブログ記事を削除できませんでした。',
	'model:none' => 'ブログ記事は一件もありません',
	'model:error:missing:title' => 'ブログのタイトルを入力してください！',
	'model:error:missing:description' => 'ブログの本文を入力してください！',
	'model:error:cannot_edit_post' => 'この記事は存在していないか、あるいはあなたにこの記事を編集する権限がないかのどちらかです。',
	'model:error:post_not_found' => 'お探しのブログ記事を見つけることができません。',
	'model:error:revision_not_found' => 'この変更記録を見つけることはできませんでした。',

	// river
	'river:create:object:model' => '%s さんは、ブログ「%s」を公表しました。',
	'river:comment:object:model' => '%s さんは、ブログ「%s」にコメントしました。',

	// notifications
	'model:notify:summary' => '新着ブログ「%s」',
	'model:notify:subject' => '新着ブログ: %s',
	'model:notify:body' =>
'
%s さんは、新しいブログを公開しました: %s

%s

閲覧・コメントするには、:
%s
',

	// widget
	'model:widget:description' => 'あなたの最近のブログ記事を表示',
	'model:moremodels' => '別のブログ記事',
	'model:numbertodisplay' => 'ブログ記事の表示件数',
	'model:nomodels' => 'ブログ記事は一つもありません'
);