<div class="post">
		<div class="post_title">
			<h1><?php echo lang('users'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('users_description'); ?></p>
				
				<?php if($this->session->flashdata('message')): ?>
				<div class="message">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?php echo lang('th_date_registered'); ?></td>
					<th class="admin"><?php echo lang('th_username'); ?></td>
					<th class="admin"><?php echo lang('th_email'); ?></td>
					<th class="admin"><?php echo lang('th_level'); ?></td>
					<th class="admin"><?php echo lang('th_last_login'); ?></td>
					<th class="admin"><?php echo lang('th_actions'); ?></td>
				</tr>
				<?php if ($users): ?>
					<?php foreach ($users as $user): ?>
					<tr>
						<td class="admin"><?php echo date('Y-m-d', strtotime($user['registered'])); ?></td>
						<td class="admin"><?php echo $user['username']; ?></td>
						<td class="admin"><?php echo $user['email']; ?></td>
						<td class="admin"><?php echo $user['level']; ?></td>
						<td class="admin"><?php echo date('Y-m-d', strtotime($user['last_login'])); ?></td>
						<td class="admin">
						<?php if ($user['id'] == $this->session->userdata('user_id')): ?>
							<?php echo anchor('user/profile', '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">'); ?>
						<?php else: ?>
							<?php echo anchor('admin/users/edit/' . $user['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">'); ?>
							<?php echo anchor('admin/users/delete/' . $user['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')")); ?></td>
						<?php endif; ?>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
					<td colspan="4"><?php echo lang('no_users'); ?></td>
					</tr>
				<?php endif; ?>
				</table>
				<br />
		</div>
</div>