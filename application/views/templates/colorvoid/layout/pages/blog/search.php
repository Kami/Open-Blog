<div class="post">
	<div class="post_title">
		<h1><?=lang('search_results_for');?> "<?=$search_term;?>"</h1>
	</div>

	<div class="post_body nicelist">
		<ol>
			<? $i = 0; ?>
			<? foreach ($posts as $post): ?>
				<? if ($i % 2 == 0): ?>
					<li class="alt">
				<? else: ?>
					<li>
				<? endif; ?>
					<div class="archive_title">
						<a href="<?=site_url('blog/post/' . $post['url']);?>"><?=$post['title'];?></a>
					</div>
					
					<div class="archive_postinfo">
						<div class="date"><?=strftime('%B %d, %Y', strtotime($post['date_posted']));?> <?=lang('in');?> <a href="<?=site_url('blog/category/' . $post['url_name']);?>"><?=$post['name'];?></a> - <a href="<?=site_url('blog/post/' . $post['url']);?>#comments"><?=lang('comments');?> (<?=$post['comment_count'];?>)</a></div>
					</div>
				</li>
				<? $i++; ?>
			<? endforeach; ?>
		</ol>
	</div>
</div>