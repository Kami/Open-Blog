<h2><?php echo $post['title']; ?></h2>

<p class="post-info"><?php echo lang('posted_in'); ?> <?php echo categories_url($post['categories']); ?> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></p>
	
<?php echo $post['excerpt']; ?>

<?php if ($post['content']): ?>
	<p><?php echo $post['content']; ?></p>
<?php endif; ?>

<?php if ($links = $this->system_library->generate_social_bookmarking_links(post_url($post['url_title'], $post['date_posted']), $post['title'])): ?>
	<p><?php echo lang('add_to'); ?> <?php echo $links; ?></p>
<?php endif; ?>
					
<p class="post-footer"><a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>#comments" class="comments"><?php echo lang('comments'); ?> (<?php echo $post['comment_count']; ?>)</a> | <span class="date"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?></span>	

<?php if ($post['comment_count'] > 0): ?>
	<h3 id="comments"><?php echo lang('responses_to', array($post['comment_count'])); ?> "<?php echo $post['title']; ?>"</h3>

	<ol class="commentlist">
		<?php $i = 0; ?>
		<?php foreach ($comments as $comment): ?>
			<?php if ($i % 2 == 0): ?>
				<li class="alt" id="comment-<?php echo $comment['id']; ?>">
			<?php else: ?>
				<li id="comment-<?php echo $comment['id']; ?>">
			<?php endif; ?>
				<cite>
					<img alt="" src="<?php echo base_url(); ?>application/views/templates/vector_lover/static/images/gravatar.jpg" height="40" width="40" />
					<?php echo $comment['author']; ?><br />
						<span class="comment-data"><a href="#comment-<?php echo $comment['id']; ?>"><?php echo strftime('%B %d, %Y ' . lang('at') . ' %H:%M:%S', strtotime($comment['date'])); ?></a></span>
				</cite>
	
				<div class="comment-text">								
					<p><?php echo $comment['content']; ?></p>
				</div>
			</li>	
		<?php $i++; ?>		
		<?php endforeach; ?>			
	</ol>
<?php endif; ?>

<h3 id="respond"><?php echo lang('leave_reply'); ?></h3>

<?php if ($post['allow_comments'] == 1): ?>
	<?php if (validation_errors()): ?>
		<br /><div class="error">
			<?php echo validation_errors(); ?>
		</div>
	<?php endif; ?>
	
	<form action="<?php echo post_url($post['url_title'], $post['date_posted']); ?>" method="post" id="commentform">
		<?php if ($this->session->userdata('logged_in') == FALSE): ?>
			<p>	
				<label for="nickname"><?php echo lang('nickname'); ?></label><br />
				<input name="nickname" id="nickname" type="text" value="<?php echo set_value('nickname'); ?>" />
			</p>
			<p>	
				<label for="email"><?php echo lang('email'); ?></label><br />
				<input name="email" id="email" type="text" value="<?php echo set_value('email'); ?>" />
			</p>
			<p>	
				<label for="website"><?php echo lang('website'); ?></label><br />
				<input name="website" id="website" type="text" value="<?php echo set_value('website'); ?>" />
			</p>
			<?php if ($this->system_library->settings['enable_captcha'] == 1): ?>
				<p>	
					<label for="confirmation_code"><?php echo lang('confirmation_code'); ?></label><br />
					<img src="<?php echo site_url('blog/captcha/normal'); ?>/<?php echo uniqid(time()); ?>" /><br /> <input name="confirmation_code" id="confirmation_code" type="text" value="<?php echo set_value('confirmation_code'); ?>" />
				</p>
			<?php endif; ?>
		<?php else: ?>
			<p>	
				<label for="nickname"><?php echo lang('nickname'); ?></label><br />
				<input name="nickname" id="nickname" type="text" value="<?php echo $this->session->userdata('username'); ?>" disabled="disabled" />
			</p>
		<?php endif; ?>
		<p>
			<label for="comment"><?php echo lang('comment'); ?></label><br />
			<textarea name="comment" id="comment" rows="10" cols="20"><?php echo set_value('comment'); ?></textarea>
		</p>	
		
		<p class="no-border">
			<input class="button" type="submit" value="<?php echo lang('submit'); ?>" />         		
		</p>
	</form>
<?php else: ?>	
	<p><?php echo lang('comments_disabled'); ?></p>
<?php endif; ?>