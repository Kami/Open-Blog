<h2><?php echo lang('posts_tagged_with'); ?>"<?php echo $tag_name; ?>"</h2>

<?php foreach ($posts as $post): ?>
	<div class="archive_post">
		<div class="archive_post_date">
			<div class="archive_post_day"><?php echo strftime('%d', strtotime($post['date_posted'])); ?></div>
			<div class="archive_post_month"><?php echo strtoupper(date('M', strtotime($post['date_posted']))); ?></div>
		</div>

		<div class="archive_post_title">
			<h3><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo $post['title']; ?></a> <?php if ($post['sticky'] == 1): ?> <img src="<?php echo base_url()?>application/views/admin/static/images/icons/sticky.gif" /> <?php endif; ?></h3>
			<div class="post_date"><?php echo lang('posted_in'); ?> <?php echo categories_url($post['categories']); ?> | <a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>#comments"><?php echo $post['comment_count']; ?> <?php echo strtolower(lang('comments')); ?></a></div>
		</div>

		<div class="clearer">&nbsp;</div>
	</div>
<?php endforeach; ?>