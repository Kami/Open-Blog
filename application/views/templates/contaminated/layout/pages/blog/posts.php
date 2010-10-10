<? foreach ($posts as $post): ?>
	<div class="post">
		<h2><a href="<?=site_url('blog/post/' . $post['url']);?>"><?=$post['title'];?></a></h2>
		<div class="descr"><?=strftime('%B %d, %Y', strtotime($post['date_posted']));?> <?=lang('by');?> <?=$post['display_name'];?></div>
		<?=$post['excerpt'];?>
		
		<? if ($post['content']): ?>
			<br /><br /><a href="<?=site_url('blog/post/' . $post['url']);?>"><?=lang('read_more');?></a><br /><br />
		<? endif; ?>
		<p class="info"><?=lang('posted_in');?> <a href="<?=site_url('blog/category/' . $post['url_name']);?>"><?=$post['name'];?></a> | <a href="<?=site_url('blog/post/' . $post['url']);?>#comments"><?=$post['comment_count'];?> <?=lang('comments');?> »</a></p>
	</div>
<? endforeach; ?>

<? if ($posts_count > $posts_per_site): ?>
	<p>
		<? if ($current_page < $pages_count): ?>
			<div class="left"><a href="<?=site_url('blog/page/' . $next_page);?>"><?=lang('older_entries');?></a></div>
		<? endif; ?>

		<? if ($current_page > 1): ?>
			<? if ($previous_page == 1): ?>
				<div class="right"><a href="<?=site_url();?>"><?=lang('newer_entries');?></a></div>
			<? else: ?>
				<div class="right"><a href="<?=site_url('blog/page/' . $previous_page);?>"><?=lang('newer_entries');?></a></div>
			<? endif; ?>
		<? endif; ?>
	</p>
<? endif; ?>