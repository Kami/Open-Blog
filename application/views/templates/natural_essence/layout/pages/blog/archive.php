<?php foreach ($posts as $post): ?>
	<h1><a href="<?php echo site_url('blog/post/' . $post['url']); ?>"><?php echo $post['title']; ?></a></h1>
	<div class="descr"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?></div>
	<?php echo $post['excerpt']; ?>
	
	<?php if ($post['content']): ?>
		<br /><br /><a href="<?php echo site_url('blog/post/' . $post['url']); ?>"><?php echo lang('read_more'); ?></a>
	<?php endif; ?>
	
	<?php if ($links = $this->system_library->generate_social_bookmarking_links(site_url('blog/post/' . $post['url']), $post['title'])): ?>
		<p><?php echo lang('add_to'); ?> <?php echo $links; ?></p>
	<?php endif; ?>
	<div class="info"><?php echo lang('posted_in'); ?> <a href="<?php echo site_url('blog/category/' . $post['url_name']); ?>"><?php echo $post['name']; ?></a> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></div>
<?php endforeach; ?>