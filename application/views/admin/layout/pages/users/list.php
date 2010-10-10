<div class="post">
		<div class="post_title">
			<h1><?=lang('users');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('users_description');?></p>
				
				<? if($this->session->flashdata('message')): ?>
				<div class="message">
					<?=$this->session->flashdata('message');?>
				</div>
				<? endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?=lang('th_date_registered');?></td>
					<th class="admin"><?=lang('th_username');?></td>
					<th class="admin"><?=lang('th_email');?></td>
					<th class="admin"><?=lang('th_level');?></td>
					<th class="admin"><?=lang('th_last_login');?></td>
					<th class="admin"><?=lang('th_actions');?></td>
				</tr>
				<? if ($users): ?>
					<? foreach ($users as $user): ?>
					<tr>
						<td class="admin"><?=date('Y-m-d', strtotime($user['registered']));?></td>
						<td class="admin"><?=$user['username'];?></td>
						<td class="admin"><?=$user['email'];?></td>
						<td class="admin"><?=$user['level'];?></td>
						<td class="admin"><?=date('Y-m-d', strtotime($user['last_login']));?></td>
						<td class="admin">
						<? if ($user['id'] == $this->session->userdata('user_id')): ?>
							<?=anchor('user/profile', '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">');?>
						<? else: ?>
							<?=anchor('admin/users/edit/' . $user['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">');?>
							<?=anchor('admin/users/delete/' . $user['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')"));?></td>
						<? endif; ?>
					</tr>
					<? endforeach; ?>
				<? else: ?>
					<tr>
					<td colspan="4"><?=lang('no_users');?></td>
					</tr>
				<? endif; ?>
				</table>
				<br />
		</div>
</div>