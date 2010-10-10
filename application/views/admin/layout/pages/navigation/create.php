<div class="post">
		<div class="post_title">
			<h1><?=lang('create_item');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('create_item_description');?></p>
			
			<? if ($this->validation->error_string != ""): ?>
				<div class="error">
				<?=$this->validation->error_string;?>
				</div>
			<? endif; ?>
			
				<table width="100%">
				<tr>
					 <td colspan="2">
					 	<fieldset id="create">
					 		<legend><?=lang('create_item');?></legend>
					 		<table>
					 			<tr>
					 				<?=form_open('admin/navigation/create');?>
					 				<td width="200px"><?=lang('form_position');?></td>
					 				<td><?=form_input(array('name' => 'position', 'id' => 'position', 'size' => '1', 'class' => 'styled', 'value' => $this->validation->position));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_title');?></td>
					 				<td><?=form_input(array('name' => 'title', 'id' => 'title', 'size' => '20', 'class' => 'styled', 'value' => $this->validation->title));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_url');?></td>
					 				<td><?=form_input(array('name' => 'url', 'id' => 'url', 'size' => '20', 'class' => 'styled', 'value' => $this->validation->url));?> (<?=lang('form_example');?> pages/about/)</td>
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
						<input type="submit" name="submit" value="<?=lang('button_create');?>" class="styled" />
						<?=form_close();?>
					</td>
				</tr>
				</table>
		</div>
</div>