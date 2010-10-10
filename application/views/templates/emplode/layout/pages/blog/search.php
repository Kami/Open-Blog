<h2><?php echo lang('search_results_for'); ?> "<?php echo $search_term; ?>"</h2>

<?php foreach ($posts as $post): ?>
	<div class="archive_post">
		<div class="archive_post_date">
			<div class="archive_post_day"><?php echo strftime('%d', strtotime($post['date_posted'])); ?></div>
			<div class="archive_post_month"><?php echo strtoupper(date('M', strtotime($post['date_posted']))); ?></div>
		</div>

		<div class="archive_post_title">
			<h3><a href="<?php echo site_url('blog/post/' . $post['url']); ?>"><?php echo $post['title']; ?></a></h3>
			<div class="post_date"><?php echo lang('posted_in'); ?> <a href="<?php echo site_url('blog/category/' . $post['url_name']); ?>"><?php echo $post['name']; ?></a> | <a href="<?php echo site_url('blog/post/' . $post['url']); ?>#comments"><?php echo $post['comment_count']; ?> <?php echo strtolower(lang('comments')); ?></a></div>
		</div>

		<div class="clearer">&nbsp;</div>
	</div>
<?php endforeach; ?>