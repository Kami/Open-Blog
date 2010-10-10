<div>
    <h2><?php echo $post['title']; ?></h2>
    <p><small><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></small></p>
    
    <div class="content">
    <?php echo $post['excerpt']; ?>
    
    <?php if ($post['content']): ?>
		<p><?php echo $post['content']; ?></p>
	<?php endif; ?>
	</div>
	<p>
		<small>
			<?php echo lang('posted_in'); ?> <?php echo categories_url($post['categories']); ?> | <?php echo $post['comment_count']; ?> <?php echo lang('comments'); ?> »
		</small>
	</p>
</div>