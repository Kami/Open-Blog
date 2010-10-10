<div class="box">
	<div class="box_title"><?php echo lang('feeds'); ?></div>
	<div class="box_content">
		<ul>
			<li><a href="<?php echo site_url('feed/rss/posts'); ?>">RSS (<?php echo lang('feeds_posts'); ?>)</a></li>
			<li><a href="<?php echo site_url('feed/rss/comments'); ?>">RSS (<?php echo lang('feeds_comments'); ?>)</a></li>
			<li><a href="<?php echo site_url('feed/atom/posts'); ?>">Atom (<?php echo lang('feeds_posts'); ?>)</a></li>
			<li><a href="<?php echo site_url('feed/atom/comments'); ?>">Atom (<?php echo lang('feeds_comments'); ?>)</a></li>
		</ul>
	</div>
</div>