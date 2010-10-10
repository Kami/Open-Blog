<div class="post">
	<div class="post_title">
		<h1 class="left"><?=$post['title'];?></h1>
		<div class="post_date right"><?=strftime('%B %d, %Y', strtotime($post['date_posted']));?></div>
		<div class="clearer">&nbsp;</div>
	</div>
	<div class="post_body">
		<p><?=$post['excerpt'];?></p>
			<? if ($post['content']): ?>
				<p><?=$post['content'];?></p>
			<? endif; ?>
		<div class="post_metadata">
			<div class="content">
				<div class="left"><?=lang('posted_in');?> <a href="<?=site_url('blog/category/' . $post['url_name']);?>"><?=$post['name'];?></a> <?=lang('by');?> <?=$post['display_name'];?></div>
				<div class="right"><span class="comment"><a href="#respond"><?=lang('leave_reply');?></a></span></div>
				<div class="clearer">&nbsp;</div>												
			</div>
		</div>
	</div>
	<div class="post_bottom"></div>
</div>

<? if ($post['comment_count'] > 0): ?>
	<div class="post" id="comments">
		<div class="post_title">
			<h1><?=lang('responses_to', array($post['comment_count']));?> "<?=$post['title'];?>"</h1>
		</div>
		
		<div class="post_body nicelist">
			<ol>
				<? $i = 0; ?>
				<? foreach ($comments as $comment): ?>
					<? if ($i % 2 == 0): ?>
						<li class="alt" id="comment-<?=$comment['id'];?>">
					<? else: ?>
						<li id="comment-<?=$comment['id'];?>">
					<? endif; ?>
						<div class="comment_gravatar left">
							<img alt="" src="<?=base_url();?>application/views/templates/colorvoid/static/images/default_avatar.jpg" height="32" width="32" />
						</div>
		
						<div class="comment_author left">
							<span class="comment"><?=$comment['author'];?></span>
							<div class="date"><a href="#comment-<?=$comment['id'];?>"><?=strftime('%B %d, %Y ' . lang('at') . ' %H:%M:%S', strtotime($comment['date']));?></a></div>
						</div>
		
						<div class="clearer">&nbsp;</div>
						
						<div class="body">									
							<p><?=$comment['content'];?></p>
						</div>
					</li>	
					<? $i++; ?>		
				<? endforeach; ?>			
			</ol>
		</div>
	</div>
<? endif; ?>

<div class="post" id="respond">
	<div class="post_title"><h1><?=lang('leave_reply');?></h1></div>
	<? if ($post['allow_comments'] == 1): ?>
		<div class="post_body">
			<p><?=lang('leave_reply_description');?></p>
			
			<? if ($this->validation->error_string != ""): ?>
				<div class="error">
				<?=$this->validation->error_string;?>
				</div>
			<? endif; ?>
			
			<table>
				<tr>
					 <td colspan="2">
					 		<table>
					 			<form action="<?=site_url('blog/post/' . $post['url']); ?>" method="post">	
					 			<? if ($this->session->userdata('logged_in') == false): ?>
						 			<tr>
						 				<td width="80px"><?=lang('nickname');?></td>
						 				<td><input name="nickname" id="nickname" type="text" value="<?=$this->validation->nickname;?>" size="22" class="styled" /></td>
						 			</tr>
						 			<tr>
						 				<td width="80px"><?=lang('email');?></td>
						 				<td><input name="email" id="email" type="text" value="<?=$this->validation->email;?>" size="22" class="styled" /></td>
						 			</tr>
						 			<tr>
						 				<td width="80px"><?=lang('website');?></td>
						 				<td><input name="website" id="website" type="text" value="<?=$this->validation->website;?>" size="22" class="styled" /></td>
						 			</tr>
					 			<? else: ?>
						 			<tr>
						 				<td width="80px"><?=lang('nickname');?></td>
							 			<td><input name="nickname" id="nickname" type="text" value="<?=$this->session->userdata('username');?>" size="22" class="styled" disabled /></td>
						 			</tr>
					 			<? endif; ?>
					 			<tr>
					 				<td valign="top"><?=lang('comment');?></td>
					 				<td><textarea name="comment" id="comment" rows="6" cols="50" class="styled"><?=$this->validation->comment;?></textarea></td>
					 			</tr>
					 		</table>
					 </td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="image" src="<?=base_url();?>application/views/templates/colorvoid/static/images/button_submit.gif" />
						</form>
					</td>
				</tr>
				</table>
		</div>
	<? else: ?>	
		<div class="post_body">
			<p><?=lang('comments_disabled');?></p>
		</div>
	<? endif; ?>
	<div class="post_bottom"></div>
</div>