<h1><?=lang('search_results_for');?> "<?=$search_term;?>"</h1>

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
<? endforeach; ?>