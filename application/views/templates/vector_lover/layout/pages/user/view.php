<h1><?php echo lang('user_profile'); ?> - <?php echo $user['username']; ?></h1>

<p>
	<strong><?php echo lang('nickname'); ?></strong> <?php echo $user['username']; ?><br />
	<strong><?php echo lang('display_name'); ?></strong> <?php echo $user['display_name']; ?><br />
	<strong><?php echo lang('date_registered'); ?></strong> <?php echo date('Y-m-d', strtotime($user['registered'])); ?><br />
	<?php if($user['website'] != ""): ?>
		<strong><?php echo lang('website'); ?></strong> <a href="<?php echo $user['website']; ?>" target="_blank"><?php echo $user['website']; ?></a><br />
	<?php endif; ?>
	<?php if($user['about_me'] != ""): ?>
		<br /><strong><?php echo lang('about_me'); ?></strong><br /><br /> <?php echo $user['about_me']; ?><br />
	<?php endif; ?>
</p>