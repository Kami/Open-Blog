<?php foreach ($posts as $post): ?>
	<h2><a href="<?php echo site_url('blog/post/' . $post['url']); ?>"><?php echo $post['title']; ?></a></h2>
	<p class="post-info"><?php echo lang('posted_in'); ?> <a href="<?php echo site_url('blog/category/' . $post['url_name']); ?>"><?php echo $post['name']; ?></a> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></p>
	
	<?php echo $post['excerpt']; ?>		
	<p class="post-footer"><a href="<?php echo site_url('blog/post/' . $post['url']); ?>" class="readmore"><?php echo lang('read_more'); ?></a> | <a href="<?php echo site_url('blog/post/' . $post['url']); ?>#comments" class="comments"><?php echo lang('comments'); ?> (<?php echo $post['comment_count']; ?>)</a> | <span class="date"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?></span>	
<?php endforeach; ?>

<?php if ($posts_count > $posts_per_site): ?>
	<?php if ($current_page < $pages_count): ?>
		<div class="float-left"><a href="<?php echo site_url('blog/page/' . $next_page); ?>/"><?php echo lang('older_entries'); ?></a></div>
	<?php endif; ?>

	<?php if ($current_page > 1): ?>
		<?php if ($previous_page == 1): ?>
			<div class="float-right"><a href="<?php echo site_url(); ?>"><?php echo lang('newer_entries'); ?></a></div>
		<?php else: ?>
			<div class="float-right"><a href="<?php echo site_url('blog/page/' . $previous_page); ?>/"><?php echo lang('newer_entries'); ?></a></div>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>