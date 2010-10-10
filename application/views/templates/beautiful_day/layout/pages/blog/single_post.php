<h1><?php echo $post['title']; ?></h1>
<div class="descr"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?> <?php echo lang('in'); ?> <?php echo categories_url($post['categories']); ?> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?></div>
<?php echo $post['excerpt']; ?>

<?php if ($post['content']): ?>
	<p><?php echo $post['content']; ?></p>
<?php endif; ?>

<div class="left">
	<?php if ($links = $this->system_library->generate_social_bookmarking_links(post_url($post['url_title'], $post['date_posted']), $post['title'])): ?>
		<p><?php echo lang('add_to'); ?> <?php echo $links; ?></p>
	<?php endif; ?>
</div>	
<div class="right"><br /><a href="#respond"><?php echo lang('leave_reply'); ?></a></div>
<div class="clearer">&nbsp;</div>												

<?php if ($post['comment_count'] > 0): ?>
	<h2><?php echo lang('responses_to', array($post['comment_count'])); ?> "<?php echo $post['title']; ?>"</h2>
		
	<ol class="comments">
		<?php $i = 0; ?>
		<?php foreach ($comments as $comment): ?>
			<?php if ($i % 2 == 0): ?>
				<li class="alt" id="comment-<?php echo $comment['id']; ?>">
			<?php else: ?>
				<li id="comment-<?php echo $comment['id']; ?>">
			<?php endif; ?>
	
			<div class="commentinfo"><small><a href="#comment-<?php echo $comment['id']; ?>">#</a></small> <?php echo $comment['author']; ?> <?php echo lang('on'); ?> <?php echo strftime('%d. %b, %Y ' . lang('at') . ' %H:%M:%S', strtotime($comment['date'])); ?></div>
			<div class="clearer">&nbsp;</div>								
			<p><?php echo $comment['content']; ?></p>
			</li>	
			<?php $i++; ?>		
		<?php endforeach; ?>			
	</ol>
<?php endif; ?>

<div id="respond">
	<h2><?php echo lang('leave_reply'); ?></h2>
	<?php if ($post['allow_comments'] == 1): ?>
		<p><?php echo lang('leave_reply_description'); ?></p>
			
		<?php if (validation_errors()): ?>
			<div class="error">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
			
		<table>
			<tr>
				 <td colspan="2">
				 		<table>
				 			<form action="<?php echo post_url($post['url_title'], $post['date_posted']); ?>" method="post">	
				 			<?php if ($this->session->userdata('logged_in') == false): ?>
					 			<tr>
					 				<td width="110px"><?php echo lang('nickname'); ?></td>
					 				<td><input name="nickname" id="nickname" type="text" value="<?php echo set_value('nickname'); ?>" size="22" class="styled" /></td>
					 			</tr>
					 			<tr>
					 				<td width="110px"><?php echo lang('email'); ?></td>
					 				<td><input name="email" id="email" type="text" value="<?php echo set_value('email'); ?>" size="22" class="styled" /></td>
					 			</tr>
					 			<tr>
					 				<td width="110px"><?php echo lang('website'); ?></td>
					 				<td><input name="website" id="website" type="text" value="<?php echo set_value('website'); ?>" size="22" class="styled" /></td>
					 			</tr>
					 			<?php if ($this->system_library->settings['enable_captcha'] == 1): ?>
							 			<tr>
							 				<td width="110px" valign="top"><?php echo lang('confirmation_image'); ?></td>
							 				<td><img src="<?php echo site_url('blog/captcha/normal'); ?>/<?php echo uniqid(time()); ?>" /></td>
							 			</tr>
							 			<tr>
							 				<td width="110px"><?php echo lang('confirmation_code'); ?></td>
							 				<td><input name="confirmation_code" id="confirmation_code" type="text" value="<?php echo set_value('confirmation_code'); ?>" size="22" class="styled" /></td>
							 			</tr>
						 		<?php endif; ?>
				 			<?php else: ?>
					 			<tr>
					 				<td width="110px"><?php echo lang('nickname'); ?></td>
						 			<td><input name="nickname" id="nickname" type="text" value="<?php echo $this->session->userdata('username'); ?>" size="22" class="styled" disabled /></td>
					 			</tr>
				 			<?php endif; ?>
				 			<tr>
				 				<td valign="top"><?php echo lang('comment'); ?></td>
				 				<td><textarea name="comment" id="comment" rows="6" cols="46" class="styled"><?php echo set_value('comment'); ?></textarea></td>
				 			</tr>
				 		</table>
				 </td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="submit" value="<?php echo lang('submit'); ?>" />
					</form>
				</td>
			</tr>
		</table>
	<?php else: ?>	
		<p><?php echo lang('comments_disabled'); ?></p>
	<?php endif; ?>
</div>