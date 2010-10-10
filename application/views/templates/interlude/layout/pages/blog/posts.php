<? foreach ($posts as $post): ?>
	<div class="post">
		<p class="date"><?=strftime('%B <b>%d</b>', strtotime($post['date_posted']));?></p>
		<h2 class="title"><a href="<?=site_url('blog/post/' . $post['url']);?>"><?=$post['title'];?></a></h2>
		<p class="meta"><small><?=lang('posted_in');?> <a href="<?=site_url('blog/category/' . $post['url_name']);?>"><?=$post['name'];?></a> <?=lang('by');?> <?=$post['display_name'];?> | <a href="<?=site_url('blog/post/' . $post['url']);?>#comments"><?=$post['comment_count'] ?> <?=lang('comments');?> &raquo;</a></small></p>
		<div class="entry">		
			<?=$post['excerpt'];?>
			
			<? if ($post['content']): ?>
				<br /><br /><a href="<?=site_url('blog/post/' . $post['url']);?>"><?=lang('read_more');?></a>
			<? endif; ?>
		</div>
	</div>
<? endforeach; ?><br />

<? if ($posts_count > $posts_per_site): ?>
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
		<div class="clearer"></div>
<? endif; ?>