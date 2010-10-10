<?php foreach ($posts as $post): ?>
	<h1><a href="<?php echo site_url('blog/post/' . $post['url']); ?>"><?php echo $post['title']; ?></a></h1>
	<div class="descr"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?> <?php echo lang('in'); ?> <a href="<?php echo site_url('blog/category/' . $post['url_name']); ?>"><?php echo $post['name']; ?></a> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></div>
	<?php echo $post['excerpt']; ?>
	
	<?php  if ($post['content']): ?>
		<br /><br /><a href="<?php echo site_url('blog/post/' . $post['url']); ?>"><?php echo lang('read_more'); ?></a><br /><br />
	<?php  endif; ?>
	
	<?php if ($links = $this->system_library->generate_social_bookmarking_links(site_url('blog/post/' . $post['url']), $post['title'])): ?>
		<p><?php echo lang('add_to'); ?> <?php echo $links; ?></p>
	<?php endif; ?>
<?php  endforeach; ?>

<?php if ($posts_count > $posts_per_site): ?>
	<p>
		<?php if ($current_page < $pages_count): ?>
			<div class="left"><a href="<?php echo site_url('blog/page/' . $next_page); ?>"><?php echo lang('older_entries'); ?></a></div>
		<?php  endif; ?>

		<?php if ($current_page > 1): ?>
			<?php  if ($previous_page == 1): ?>
				<div class="right"><a href="<?php echo site_url();?>"><?php echo lang('newer_entries'); ?></a></div>
			<?php  else: ?>
				<div class="right"><a href="<?php echo site_url('blog/page/' . $previous_page); ?>"><?php echo lang('newer_entries'); ?></a></div>
			<?php endif; ?>
		<?php endif; ?>
	</p>
<?php  endif; ?>