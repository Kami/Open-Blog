<? foreach ($posts as $post): ?>
	<h1><a href="<?=site_url('blog/post/' . $post['url']);?>"><?=$post['title'];?></a></h1>
	<div class="descr"><?=strftime('%B %d, %Y', strtotime($post['date_posted']));?> <?=lang('in');?> <a href="<?=site_url('blog/category/' . $post['url_name']);?>"><?=$post['name'];?></a> <?=lang('by');?> <?=$post['display_name'];?></div>
	<?=$post['excerpt'];?>
	
	<? if ($post['content']): ?>
		<br /><br /><a href="<?=site_url('blog/post/' . $post['url']);?>"><?=lang('read_more');?></a>
	<? endif; ?>
<? endforeach; ?>