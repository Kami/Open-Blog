<h1><?php echo lang('posts_tagged_with'); ?>"<?php echo $tag_name; ?>"</h1>

<?php foreach ($posts as $post): ?>
	<h1><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo $post['title']; ?></a> <?php if ($post['sticky'] == 1): ?> <img src="<?php echo base_url()?>application/views/admin/static/images/icons/sticky.gif" /> <?php endif; ?></h1>
	<div class="descr"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?></div>
	<?php echo $post['excerpt']; ?>
	
	<?php if ($post['content']): ?>
		<br /><br /><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo lang('read_more'); ?></a>
	<?php endif; ?>
	<div class="info"><?php echo lang('posted_in'); ?> <?php echo categories_url($post['categories']); ?> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></div>
<?php endforeach; ?>