<?php
return array(
	'model' => '블로그',
	'model:models' => '블로그',
	'model:revisions' => '개정',
	'model:archives' => '기록
',
	'model:model' => '블로그',
	'item:object:model' => '블로그',

	'model:title:user_models' => '%s의 블로그',
	'model:title:all_models' => '모든 블로그',
	'model:title:friends' => '친구의 블로그',

	'model:group' => '모둠 블로그',
	'model:enablemodel' => '모둠 블로그 활성화',
	'model:write' => '블로그 글 쓰기',

	// Editing
	'model:add' => '블로그 글 추가',
	'model:edit' => '블로그 글 수정',
	'model:excerpt' => '요약',
	'model:body' => '본문',
	'model:save_status' => '마지막 저장:',
	
	'model:revision' => '개정',
	'model:auto_saved_revision' => '자동저장',

	// messages
	'model:message:saved' => '블로그 글이 저장되었습니다.',
	'model:error:cannot_save' => '블로그 글을 저장할 수 없습니다.',
	'model:error:cannot_auto_save' => '블로그 글을 자동저장할 수 없습니다.',
	'model:error:cannot_write_to_container' => '모둠에 블로그를 저장할 권한이 부족합니다. ',
	'model:messages:warning:draft' => '이 글의 저장되지 않은 초본이 있습니다. ',
	'model:edit_revision_notice' => '(구 판)',
	'model:message:deleted_post' => '블로그글이 삭제되었습니다.',
	'model:error:cannot_delete_post' => '블로그 글을 삭제할 수 없습니다. ',
	'model:none' => '블로그 글이 없습니다. ',
	'model:error:missing:title' => '블로그의 제목을 입력하세요',
	'model:error:missing:description' => '블로그의 본문을 입력하세요',
	'model:error:cannot_edit_post' => '글이 존재하지 않거나 편집할 권한이 없습니다.',
	'model:error:post_not_found' => '해당 블로그 글을 찾을 수 없습니다. ',
	'model:error:revision_not_found' => '이전판을 찾을 수 없습니다. ',

	// river
	'river:create:object:model' => '%s 가 %s 글을 작성하였습니다.',
	'river:comment:object:model' => '%s 가 블로그 %s 에 댓글을 남겼습니다. ',

	// notifications
	'model:notify:summary' => '새 블로그 글이 %s 를 언급하였습니다. ',
	'model:notify:subject' => '새 블로그글: %s',
	'model:notify:body' =>
'
%s가 새 블로그글 %s 을 작성하였습니다. 

%s

블로그 글을 보고 댓글을 남깁니다:
%s
',

	// widget
	'model:widget:description' => '최신의 블로그글을 표시합니다.',
	'model:moremodels' => '블로그글 더보기',
	'model:numbertodisplay' => '출력할 블로그글의 수',
	'model:nomodels' => '블로그글이 없습니다.'
);