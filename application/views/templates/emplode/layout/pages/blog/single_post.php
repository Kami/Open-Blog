<div class="post">
	<div class="post_title"><h2><?php echo $post['title']; ?></h2></div>
	<div class="post_date"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></div>
	<div class="post_body">
		<?php echo $post['excerpt']; ?>

		<?php if ($post['content']): ?>
			<p><?php echo $post['content']; ?></p>
		<?php endif; ?>
	</div>
	
	<?php if ($links = $this->system_library->generate_social_bookmarking_links(post_url($post['url_title'], $post['date_posted']), $post['title'])): ?>
		<p><?php echo lang('add_to'); ?> <?php echo $links; ?></p>
	<?php endif; ?>
			
	<div class="post_meta">
		<?php echo lang('posted_in'); ?>: <?php echo categories_url($post['categories']); ?>
	</div>
</div>

<p class="right"><a href="#respond"><?php echo lang('leave_reply'); ?> &#187;</a></p>
<div class="clearer">&nbsp;</div>										

<?php if ($post['comment_count'] > 0): ?>
	<h3 class="left" id="comments"><?php echo lang('responses_to', array($post['comment_count'])); ?> "<?php echo $post['title']; ?>"</h3>
	<div class="clearer">&nbsp;</div>
		
	<div class="comment_list">
		<?php $i = 0; ?>
		<?php foreach ($comments as $comment): ?>
			<?php if ($i % 2 == 0): ?>
				<div class="comment alt" id="comment-<?php echo $comment['id']; ?>">
			<?php else: ?>
				<div class="comment" id="comment-<?php echo $comment['id']; ?>">
			<?php endif; ?>
			
				<div class="comment_gravatar left"><img alt="" src="<?php echo base_url(); ?>application/views/templates/emplode/static/images/default_avatar.jpg" height="32" width="32" /></div>
	
				<div class="comment_author left">
					<?php echo $comment['author']; ?>
					<div class="comment_date"><a href="#comment-<?php echo $comment['id']; ?>"><?php echo strftime('%B %d, %Y ' . lang('at') . ' %H:%M:%S', strtotime($comment['date'])); ?></a></div>
				</div>
				
				<div class="clearer">&nbsp;</div>
				
				<div class="comment_body">		
					<p><?php echo $comment['content']; ?></p>
				</div>
			</div>	
			<?php $i++; ?>		
		<?php endforeach; ?>			
	</div>
<?php endif; ?>

<a name="respond"></a>
<?php if ($post['allow_comments'] == 1): ?>
	<fieldset>
		<div class="legend"><h3><?php echo lang('leave_reply'); ?></h3></div>
		
		<?php if (validation_errors()): ?>
			<br /><div class="error">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>	

		<form action="<?php echo post_url($post['url_title'], $post['date_posted']); ?>" method="post">	
			<?php if ($this->session->userdata('logged_in') == false): ?>
				<div class="form_row">
					<div class="form_property form_required"><?php echo lang('nickname'); ?></div>
					<div class="form_value"><input name="nickname" id="nickname" type="text" value="<?php echo set_value('nickname'); ?>" size="22" /></div>
		
					<div class="clearer">&nbsp;</div>
				</div>
				<div class="form_row">
					<div class="form_property form_required"><?php echo lang('email'); ?></div>
					<div class="form_value"><input name="email" id="email" type="text" value="<?php echo set_value('email'); ?>" size="22" /></div>
		
					<div class="clearer">&nbsp;</div>
				</div>
				<div class="form_row">
					<div class="form_property"><?php echo lang('website'); ?></div>
					<div class="form_value"><input name="website" id="website" type="text" value="<?php echo set_value('website'); ?>" size="22" /></div>
		
					<div class="clearer">&nbsp;</div>
				</div>
				<?php if ($this->system_library->settings['enable_captcha'] == 1): ?>
					<div class="form_row">
						<div class="form_property form_required"><?php echo lang('confirmation_image'); ?></div>
						<div class="form_value"><img src="<?php echo site_url('blog/captcha/normal'); ?>/<?php echo uniqid(time()); ?>" /></div>
			
						<div class="clearer">&nbsp;</div>
					</div>
					<div class="form_row">
						<div class="form_property form_required"><?php echo lang('confirmation_code'); ?></div>
						<div class="form_value"><input name="confirmation_code" id="confirmation_code" type="text" value="<?php echo set_value('confirmation_code'); ?>" size="22" /></div>
			
						<div class="clearer">&nbsp;</div>
					</div>
				<?php endif; ?>
			<?php else: ?>
				<div class="form_row">
					<div class="form_property form_required"><?php echo lang('nickname'); ?></div>
					<div class="form_value"><input name="nickname" id="nickname" type="text" value="<?php echo $this->session->userdata('username'); ?>" size="22" disabled /></div>
		
					<div class="clearer">&nbsp;</div>
				</div>
			<?php endif; ?>
			<div class="form_row">
				<div class="form_property form_required"><?php echo lang('comment'); ?></div>
				<div class="form_value"><textarea rows="10" cols="46" name="comment" id="comment"><?php echo set_value('comment'); ?></textarea></div>
	
				<div class="clearer">&nbsp;</div>
			</div>
			
			<div class="form_row form_row_submit">
				<div class="form_value"><input type="submit" name="submit" value="<?php echo lang('submit'); ?>" class="button" /></div>
				
				<div class="clearer">&nbsp;</div>
			</div>
		</form>
	</fieldset>
<?php else: ?>
	<h3><?php echo lang('leave_reply'); ?></h3>
	<p><?php echo lang('comments_disabled'); ?></p>
<?php endif; ?>