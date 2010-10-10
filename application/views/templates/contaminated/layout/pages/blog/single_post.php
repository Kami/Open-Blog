<h2><?=$post['title'];?></h2>
<div class="descr"><?=strftime('%B %d, %Y', strtotime($post['date_posted']));?> <?=lang('in');?> <a href="<?=site_url('blog/category/' . $post['url_name']);?>"><?=$post['name'];?></a> <?=lang('by');?> <?=$post['display_name'];?></div>
<?=$post['excerpt'];?>

<? if ($post['content']): ?>
	<p><?=$post['content'];?></p>
<? endif; ?>
<div class="right"><a href="#respond"><?=lang('leave_reply');?></a></div>
<div class="clearer">&nbsp;</div>												

<? if ($post['comment_count'] > 0): ?>
	<h2><?=lang('responses_to', array($post['comment_count']));?> "<?=$post['title'];?>"</h2>
		
	<ol class="comments">
		<? $i = 0; ?>
		<? foreach ($comments as $comment): ?>
			<? if ($i % 2 == 0): ?>
				<li class="alt" id="comment-<?=$comment['id'];?>">
			<? else: ?>
				<li id="comment-<?=$comment['id'];?>">
			<? endif; ?>
	
			<div class="commentinfo"><small><a href="#comment-<?=$comment['id'];?>">#</a></small> <?=$comment['author'];?> <?=lang('on');?> <?=strftime('%d. %b, %Y ' . lang('at') . ' %H:%M:%S', strtotime($comment['date']));?></div>
			<div class="clearer">&nbsp;</div>								
			<p><?=$comment['content'];?></p>
			</li>	
			<? $i++; ?>		
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
				 				<td><textarea name="comment" id="comment" rows="6" cols="50" class="styled"><?=$this->validation->comment;?></textarea></td>
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