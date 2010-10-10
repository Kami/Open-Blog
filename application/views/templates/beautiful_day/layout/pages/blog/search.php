<h1><?php echo lang('search_results_for'); ?> "<?php echo $search_term; ?>"</h1>

<?php foreach ($posts as $post): ?>
	<h1><a href="<?php echo site_url('blog/post/' . $post['url']); ?>"><?php echo $post['title']; ?></a></h1>
	<div class="descr"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?> <?php echo lang('in'); ?> <a href="<?php echo site_url('blog/category/' . $post['url_name']);?>"><?php echo $post['name']; ?></a> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></div>
	<?php echo $post['excerpt'];?>
	
	<?php if ($post['content']): ?>
		<br /><br /><a href="<?php echo site_url('blog/post/' . $post['url']); ?>"><?php echo lang('read_more'); ?></a>
	<?php endif; ?>
<?php endforeach; ?>