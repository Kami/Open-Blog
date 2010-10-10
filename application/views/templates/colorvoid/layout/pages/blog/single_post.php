<div class="post">
	<div class="post_title">
		<h1 class="left"><?php echo $post['title']; ?></h1>
		<div class="post_date right"><?php echo strftime('%B %d, %Y', strtotime($post['date_posted'])); ?></div>
		<div class="clearer">&nbsp;</div>
	</div>
	<div class="post_body">
		<p><?php echo $post['excerpt']; ?></p>
			<?php if ($post['content']): ?>
				<p><?php echo $post['content']; ?></p>
			<?php endif; ?>
		<div class="post_metadata">
			<div class="content">
				<div class="left">
					<?php if ($links = $this->system_library->generate_social_bookmarking_links(post_url($post['url_title'], $post['date_posted']), $post['title'])): ?>
							<?php echo lang('add_to'); ?> <?php echo $links; ?><br />
						<?php endif; ?>
					<?php echo lang('posted_in'); ?> <?php echo categories_url($post['categories']); ?> <?php echo lang('by'); ?> <?php echo $post['display_name']; ?>
				</div>
				<div class="right"><br /><span class="comment"><a href="#respond"><?php echo lang('leave_reply'); ?></a></span></div>
				<div class="clearer">&nbsp;</div>												
			</div>
		</div>
	</div>
	<div class="post_bottom"></div>
</div>

<?php if ($post['comment_count'] > 0): ?>
	<div class="post" id="comments">
		<div class="post_title">
			<h1><?php echo lang('responses_to', array($post['comment_count'])); ?> "<?php echo $post['title']; ?>"</h1>
		</div>
		
		<div class="post_body nicelist">
			<ol>
				<?php $i = 0; ?>
				<?php foreach ($comments as $comment): ?>
					<?php if ($i % 2 == 0): ?>
						<li class="alt" id="comment-<?php echo $comment['id']; ?>">
					<?php else: ?>
						<li id="comment-<?php echo $comment['id']; ?>">
					<?php endif; ?>
						<div class="comment_gravatar left">
							<img alt="" src="<?php echo base_url(); ?>application/views/templates/colorvoid/static/images/default_avatar.jpg" height="32" width="32" />
						</div>
		
						<div class="comment_author left">
							<span class="comment"><?php echo $comment['author']; ?></span>
							<div class="date"><a href="#comment-<?php echo $comment['id']; ?>"><?php echo strftime('%B %d, %Y ' . lang('at') . ' %H:%M:%S', strtotime($comment['date'])); ?></a></div>
						</div>
		
						<div class="clearer">&nbsp;</div>
						
						<div class="body">									
							<p><?php echo $comment['content']; ?></p>
						</div>
					</li>	
					<?php $i++; ?>		
				<?php endforeach; ?>			
			</ol>
		</div>
	</div>
<?php endif; ?>

<div class="post" id="respond">
	<div class="post_title"><h1><?php echo lang('leave_reply'); ?></h1></div>
	<?php if ($post['allow_comments'] == 1): ?>
		<div class="post_body">
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
					 			<?php if ($this->session->userdata('logged_in') == FALSE): ?>
						 			<tr>
						 				<td width="120px"><?php echo lang('nickname'); ?></td>
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
					 				<td><textarea name="comment" id="comment" rows="6" cols="50" class="styled"><?php echo set_value('comment'); ?></textarea></td>
					 			</tr>
					 		</table>
					 </td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="image" src="<?php echo base_url(); ?>application/views/templates/colorvoid/static/images/button_submit.gif" />
						</form>
					</td>
				</tr>
				</table>
		</div>
	<?php else: ?>	
		<div class="post_body">
			<p><?php echo lang('comments_disabled'); ?></p>
		</div>
	<?php endif; ?>
	<div class="post_bottom"></div>
</div>