<div class="post">
		<div class="post_title">
			<h1><?=lang('edit_comment');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('edit_comment_description');?></p>
			
			<? if ($this->validation->error_string != ""): ?>
				<div class="error">
				<?=$this->validation->error_string;?>
				</div>
			<? endif; ?>
			
				<table width="100%">
				<tr>
					 <td colspan="2">
					 	<fieldset id="main">
					 		<legend><?=lang('form_main');?></legend>
					 		<table>
					 			<tr>
					 				<?=form_open('admin/comments/edit/');?>
					 				<td width="150px" valign="top"><?=lang('form_comment');?></td>
					 				<td><?=form_textarea(array('name' => 'comment', 'id' => 'comment', 'rows' => '10', 'cols' => '60', 'class' => 'styled', 'value' => $this->validation->comment));?></td>
					 			</tr>
					 		</table>
					 	</fieldset>
					 </td>
				</tr>
				<tr>
					 <td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2">
						<?=form_hidden('id', $comment['id']) ?>
						<input type="submit" name="submit" value="<?=lang('button_edit');?>" class="styled" />
						<?=form_close();?>
					</td>
				</tr>
				</table>
		</div>
</div>