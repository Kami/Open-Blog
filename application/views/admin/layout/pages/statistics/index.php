<div class="post">
		<div class="post_title">
			<h1><?php echo lang('statistics'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('statistics_description'); ?></p>
			<p>
				<?php echo lang('posts'); ?> <strong><?php echo $posts_count_all; ?></strong> (<strong><?php echo $posts_count_published; ?></strong> <?php echo lang('published'); ?>, <strong><?php echo $posts_count_draft; ?></strong> <?php echo lang('draft'); ?>)<br />
				<?php if ($post_with_most_comments): ?>
					<?php echo lang('most_popular_post'); ?> <a href="<?php echo post_url($post_with_most_comments['url_title'], $post_with_most_comments['date_posted']); ?>" target="_blank"><strong><?php echo $post_with_most_comments['title']; ?></strong></a> (<strong><?php echo $post_with_most_comments['comments_count']; ?></strong> <?php echo lang('comments_total'); ?>)<br />
				<?php endif; ?>
				<?php echo lang('categories'); ?> <strong><?php echo $categories_count; ?></strong><br />
				<?php if ($category_with_most_posts): ?>	
					<?php echo lang('category_with_most_posts'); ?> <a href="<?php echo category_url($category_with_most_posts['url_name']); ?>" target="_blank"><strong><?php echo $category_with_most_posts['name']; ?></strong></a> (<strong><?php echo $category_with_most_posts['posts_count']; ?></strong> <?php echo lang('posts_total'); ?>)<br />
				<?php endif; ?>
				<?php echo lang('comments'); ?> <strong><?php echo $comments_count_all; ?></strong> (<strong><?php echo $comments_count_members; ?></strong> <?php echo lang('registered_users'); ?>, <strong><?php echo $comments_count_guests; ?></strong> <?php echo lang('guests'); ?>)<br />
			</p>
		</div>
</div>