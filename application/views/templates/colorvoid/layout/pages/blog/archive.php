<?php foreach ($posts as $post): ?>
	<div class="post">
		<div class="post_title">
			<h1 class="left"><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo $post['title']; ?></a> <?php if ($post['sticky'] == 1): ?> <img src="<?php echo base_url()?>application/views/admin/static/images/icons/sticky.gif" /> <?php endif; ?></h1>
			<div class="post_date right"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?></div>
			<div class="clearer">&nbsp;</div>
		</div>
		<div class="post_body">
			<?php echo $post['excerpt']; ?>
			
			<?php if ($post['content']): ?>
				<p class="read_more"><br /><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo lang('read_more'); ?></a></p>
			<?php endif; ?>
			
			<div class="post_metadata">
				<div class="content">
					<div class="left">
						<?php if ($links = $this->system_library->generate_social_bookmarking_links(post_url($post['url_title'], $post['date_posted']), $post['title'])): ?>
							<?php echo lang('add_to'); ?> <?php echo $links; ?><br />
						<?php endif; ?>
						<?php echo lang('posted_in'); ?> <?php echo categories_url($post['categories']); ?> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?>
					</div>
					<div class="right">
						<br />
						<span class="comment"><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>#comments"><?php echo lang('comments'); ?> (<?php echo $post['comment_count']; ?>) </a></span>
					</div>
					<div class="clearer">&nbsp;</div>
				</div>
			</div>
		</div>
		<div class="post_bottom"></div>
	</div>
<?php endforeach; ?>