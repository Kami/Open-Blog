<?php foreach ($posts as $post): ?>
	<div class="post">
		<h2><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo $post['title']; ?></a></h2>
		<small><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></small>
				
		<div class="entry">
			<?php echo $post['excerpt']; ?>
		</div>
		
		<p class="postmetadata"><?php echo lang('posted_in'); ?> <?php echo categories_url($post['categories']); ?> | <a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>#comments"><?php echo $post['comment_count']; ?> <?php echo lang('comments'); ?> »</a></p>
	</div>
<?php endforeach; ?>

<div class="navigation">
	<?php if ($current_page < $pages_count): ?>
				<a href="<?php echo site_url('blog/page/' . $next_page); ?>/"><?php echo lang('older_entries'); ?></a>
			<?php endif; ?>
				
			<?php if ($current_page > 1): ?>
				<?php if ($previous_page == 1): ?>
					<a href="<?php echo site_url(); ?>"><?php echo lang('newer_entries'); ?></a>
				<?php else: ?>
					<a href="<?php echo site_url('blog/page/' . $previous_page); ?>/"><?php echo lang('newer_entries'); ?></a>
				<?php endif; ?>
			<?php else: ?>
				<?php echo lang('newer_entries'); ?>
			<?php endif; ?>
</div>