<div class="post">
	<p class="date"><?=strftime('%B <b>%d</b>', strtotime($post['date_posted']));?></p>
	<h2 class="title"><a href="<?=site_url('blog/post/' . $post['url']);?>"><?=$post['title'];?></a></h2>
	<p class="meta"><small><?=lang('posted_in');?> <a href="<?=site_url('blog/category/' . $post['url_name']);?>"><?=$post['name'];?></a> <?=lang('by');?> <?=$post['display_name'];?> | <a href="<?=site_url('blog/post/' . $post['url']);?>#comments"><?=$post['comment_count'] ?> <?=lang('comments');?> &raquo;</a></small></p>
	<div class="entry">		
		<?=$post['excerpt'];?>
			
		<? if ($post['content']): ?>
			<br /><br /><a href="<?=site_url('blog/post/' . $post['url']);?>"><?=lang('read_more');?></a>
		<? endif; ?>
	</div>
</div>

<? if ($post['comment_count'] > 0): ?>
	<h2><?=lang('responses_to', array($post['comment_count']));?> "<?=$post['title'];?>"</h2>
			
	<ol class="comments">
		<? foreach ($comments as $comment): ?>
			<li id="comment-<?=$comment['id'];?>">
				<div class="commentinfo"><small><a href="#comment-<?=$comment['id'];?>">#</a></small> <?=$comment['author'];?> <?=lang('on');?> <?=strftime('%d. %b, %Y ' . lang('at') . ' %H:%M:%S', strtotime($comment['date']));?></div>								
				<p><?=$comment['content'];?></p>
			</li>	
		<? endforeach; ?>			
	</ol>
<? endif; ?>

<div id="respond">
	<h2><?=lang('leave_reply');?></h2>
	<? if ($post['allow_comments'] == 1): ?>
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
				 				<td><textarea name="comment" id="comment" rows="6" cols="40" class="styled"><?=$this->validation->comment;?></textarea></td>
				 			</tr>
				 		</table>
				 </td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="submit" value="<?=lang('submit');?>" />
					</form>
				</td>
			</tr>
		</table>
	<? else: ?>	
		<p><?=lang('comments_disabled');?></p>
	<? endif; ?>
</div>