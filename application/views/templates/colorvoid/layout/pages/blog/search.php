<div class="post">
	<div class="post_title">
		<h1><?php echo lang('search_results_for'); ?> "<?php echo $search_term; ?>"</h1>
	</div>

	<div class="post_body nicelist">
		<ol>
			<?php $i = 0; ?>
			<?php foreach ($posts as $post): ?>
				<?php if ($i % 2 == 0): ?>
					<li class="alt">
				<?php else: ?>
					<li>
				<?php endif; ?>
					<div class="archive_title">
						<a href="<?php echo site_url('blog/post/' . $post['url']); ?>"><?php echo $post['title']; ?></a>
					</div>
					
					<div class="archive_postinfo">
						<div class="date"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?> <?php echo lang('in'); ?> <a href="<?php echo site_url('blog/category/' . $post['url_name']); ?>"><?php echo $post['name']; ?></a> - <a href="<?php echo site_url('blog/post/' . $post['url']); ?>#comments"><?php echo lang('comments'); ?> (<?php echo $post['comment_count']; ?>)</a></div>
					</div>
				</li>
				<?php $i++; ?>
			<?php endforeach; ?>
		</ol>
	</div>
</div>