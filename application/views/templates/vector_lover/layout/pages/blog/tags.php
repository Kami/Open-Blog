<h1><?php echo lang('posts_tagged_with'); ?>"<?php echo $tag_name; ?>"</h1>

<?php foreach ($posts as $post): ?>
	<h2><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo $post['title']; ?></a> <?php if ($post['sticky'] == 1): ?> <img src="<?php echo base_url()?>application/views/admin/static/images/icons/sticky.gif" /> <?php endif; ?></h2>
	<p class="post-info"><?php echo lang('posted_in'); ?> <?php echo categories_url($post['categories']); ?> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></p>
	
	<?php echo $post['excerpt']; ?>		
	<p class="post-footer"><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>" class="readmore"><?php echo lang('read_more'); ?></a> | <a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>#comments" class="comments"><?php echo lang('comments'); ?> (<?php echo $post['comment_count']; ?>)</a> | <span class="date"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?></span>	
<?php endforeach; ?>