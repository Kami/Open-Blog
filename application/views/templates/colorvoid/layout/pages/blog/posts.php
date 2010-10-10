<? foreach ($posts as $post): ?>
	<div class="post">
		<div class="post_title">
			<h1 class="left"><a href="<?=site_url('blog/post/' . $post['url']);?>"><?=$post['title'];?></a></h1>
			<div class="post_date right"><?=strftime('%B %d, %Y', strtotime($post['date_posted']));?></div>
			<div class="clearer">&nbsp;</div>
		</div>
		<div class="post_body">
			<?=$post['excerpt'];?>
			
			<? if ($post['content']): ?>
				<p class="read_more"><br /><a href="<?=site_url('blog/post/' . $post['url']);?>"><?=lang('read_more');?></a></p>
			<? endif; ?>
			
			<div class="post_metadata">
				<div class="content">
					<div class="left">
						<?=lang('posted_in');?> <a href="<?=site_url('blog/category/' . $post['url_name']);?>"><?=$post['name'];?></a> <?=lang('by');?> <?=$post['display_name'];?>
					</div>
					<div class="right">
						<span class="comment"><a href="<?=site_url('blog/post/' . $post['url']);?>#comments"><?=lang('comments');?> (<?=$post['comment_count'];?>) </a></span>
					</div>
					<div class="clearer">&nbsp;</div>
				</div>
			</div>
		</div>
		<div class="post_bottom"></div>
	</div>
<? endforeach; ?>

<? if ($posts_count > $posts_per_site): ?>
	<div class="pagenavigation">
		<div class="pagenav">
			<? if ($current_page < $pages_count): ?>
				<div class="left"><a href="<?=site_url('blog/page/' . $next_page);?>/"><?=lang('older_entries');?></a></div>
			<? endif; ?>

			<? if ($current_page > 1): ?>
				<? if ($previous_page == 1): ?>
					<div class="right"><a href="<?=site_url();?>"><?=lang('newer_entries');?></a></div>
				<? else: ?>
					<div class="right"><a href="<?=site_url('blog/page/' . $previous_page);?>/"><?=lang('newer_entries');?></a></div>
				<? endif; ?>
			<? endif; ?>
			<div class="clearer">&nbsp;</div>
		</div>
		<div class="pagenav_bottom"></div>
	</div>
<? endif; ?>