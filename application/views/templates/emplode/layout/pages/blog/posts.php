<?php foreach ($posts as $post): ?>
	<div class="post">
		<div class="post_title"><h2><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo $post['title']; ?></a> <?php if ($post['sticky'] == 1): ?> <img src="<?php echo base_url()?>application/views/admin/static/images/icons/sticky.gif" /> <?php endif; ?></h2></div>
		<div class="post_date"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?>  <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></div>
		<div class="post_body">		
			<?php echo $post['excerpt']; ?>
		</div>
		
		<?php if ($post['content']): ?>
			<br /><br /><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo lang('read_more'); ?></a><br /><br />
		<?php endif; ?>
		
		<?php if ($links = $this->system_library->generate_social_bookmarking_links(post_url($post['url_title'], $post['date_posted']), $post['title'])): ?>
			<p><?php echo lang('add_to'); ?> <?php echo $links; ?></p>
		<?php endif; ?>
		
		<div class="post_meta">
			<?php echo lang('posted_in'); ?>: <?php echo categories_url($post['categories']); ?> | <?php echo lang('comments'); ?>:  <a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>#comments"><?php echo $post['comment_count']; ?></a>
		</div>
	</div>
<?php endforeach; ?>

<?php if ($posts_count > $posts_per_page): ?>
	<p>
		<?php if ($current_page < $pages_count): ?>
			<div class="left"><a href="<?php echo site_url('blog/page/' . $next_page); ?>"><?php echo lang('older_entries'); ?></a></div>
		<?php endif; ?>

		<?php if ($current_page > 1): ?>
			<?php if ($previous_page == 1): ?>
				<div class="right"><a href="<?php echo site_url(); ?>"><?php echo lang('newer_entries'); ?></a></div>
			<?php else: ?>
				<div class="right"><a href="<?php echo site_url('blog/page/' . $previous_page); ?>"><?php echo lang('newer_entries'); ?></a></div>
			<?php endif; ?>
		<?php endif; ?>
	</p>
<?php endif; ?>