<div class="post" id="post">
	<h2><?php echo $post['title']; ?></h2>
	<small><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></small>
				
	<div class="entrytext">
		<?php echo $post['excerpt']; ?>
		
		<?php if ($post['content']): ?>
			<p><?php echo $post['content']; ?></p>
		<?php endif; ?>
	</div>

	<p class="postmetadata alt">
		<small>
			<?php echo lang('posted_in'); ?> <?php echo categories_url($post['categories']); ?> | <?php echo $post['comment_count']; ?> <?php echo lang('comments'); ?> »</p>
		</small>	
	</p>
</div>

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
			<cite><?php echo $comment['author']; ?> (<?php echo strftime('%B %d, %Y ' . lang('at') . ' %H:%M:%S', strtotime($comment['date'])); ?>):</cite>
			<br /> <?php echo $comment['content']; ?>
			</li>	
			<?php $i++; ?>		
		<?php endforeach; ?>			
	</ol>
<?php endif; ?>

<?php if ($post['allow_comments'] == 1): ?>
	<h3 id="respond"><?php echo lang('leave_reply'); ?></h3>
	
	<?php if (validation_errors()): ?>
		<div class="error">
			<?php echo validation_errors(); ?>
		</div>
	<?php endif; ?>
			
	<form action="<?php echo post_url($post['url_title'], $post['date_posted']); ?>" method="post">
	<?php if ($this->session->userdata('logged_in') == FALSE): ?>
		<p><label for="nickname"><small><?php echo lang('nickname'); ?>:</small></label>
		<input type="text" name="nickname" id="nickname" value="<?php echo set_value('nickname'); ?>" size="18" tabindex="1" /></p>
		<p><label for="nickname"><small><?php echo lang('email'); ?>:</small></label>
		<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>" size="18" tabindex="1" /></p>
		<p><label for="nickname"><small><?php echo lang('website'); ?>:</small></label>
		<input type="text" name="website" id="website" value="<?php echo set_value('website'); ?>" size="18" tabindex="1" /></p>
		<?php if ($this->system_library->settings['enable_captcha'] == 1): ?>
			<p>
			<img src="<?php echo site_url('blog/captcha/mobile'); ?>/<?php echo uniqid(time()); ?>" /></p>
			<p><label for="confirmation_code"><small><?php echo lang('confirmation_code'); ?>:</small></label>
			<input type="text" name="confirmation_code" id="confirmation_code" value="<?php echo set_value('confirmation_code'); ?>" size="10" tabindex="1" /></p>
		<?php endif; ?>
	<?php else: ?>
		<p><label for="nickname"><small><?php echo lang('nickname'); ?>:</small></label><br />
		<input type="text" name="nickname" id="nickname" value="<?php echo $this->session->userdata('username'); ?>" size="18" tabindex="1" disabled="disabled" /></p>
	<?php endif; ?>
	<label for="comment"><small><?php echo lang('comment'); ?>:</small></label></p>
	<p><textarea name="comment" id="comment" cols="21" rows="4" tabindex="4"><?php echo set_value('comment'); ?></textarea>
	<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo lang('submit'); ?>" /></p>
	</form>
<?php endif; ?>