<div class="post">
		<div class="post_title">
			<h1><?=lang('create_link');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('create_link_description');?></p>
			
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
					 				<?=form_open('admin/links/create');?>
					 				<td width="200px"><?=lang('form_name');?></td>
					 				<td><?=form_input(array('name' => 'name', 'id' => 'name', 'size' => '20', 'class' => 'styled', 'value' => $this->validation->name));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_url');?></td>
					 				<td><?=form_input(array('name' => 'url', 'id' => 'url', 'size' => '30', 'class' => 'styled', 'value' => $this->validation->url));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_description');?></td>
					 				<td><?=form_input(array('name' => 'description', 'id' => 'description', 'size' => '40', 'class' => 'styled', 'value' => $this->validation->description));?></td>
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
					 	<fieldset id="settings">
					 		<legend><?=lang('form_settings');?></legend>
					 		<table>
					 			<tr>
					 				<td width="150px" valign="top"><?=lang('form_target');?></td>
					 				<td><?=form_dropdown('target', array('blank' => 'blank', 'self' => 'self', 'parent' => 'parent'), $this->validation->target);?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?=lang('form_visible');?></td>
					 				<td><?=form_dropdown('visible', array('yes' => lang('form_yes'), 'no' => lang('form_no')), $this->validation->visible);?></td>
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
						<input type="submit" name="submit" value="<?=lang('button_create');?>" class="styled" />
						<?=form_close();?>
					</td>
				</tr>
				</table>
		</div>
</div>