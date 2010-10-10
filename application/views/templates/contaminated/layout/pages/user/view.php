<h2><?=lang('user_profile');?> - <?=$user['username'];?></h2>
<p>
	<strong><?=lang('nickname');?></strong> <?=$user['username'];?><br />
	<strong><?=lang('display_name');?></strong> <?=$user['display_name'];?><br />
	<strong><?=lang('date_registered');?></strong> <?=date('Y-m-d', strtotime($user['registered']));?><br />
	<? if($user['website'] != ""): ?>
		<strong><?=lang('website');?></strong> <a href="<?=$user['website'];?>" target="_blank"><?=$user['website'];?></a><br />
	<? endif; ?>
	<? if($user['about_me'] != ""): ?>
		<br /><strong><?=lang('about_me');?></strong><br /><br /> <?=$user['about_me'];?><br />
	<? endif; ?>
</p>