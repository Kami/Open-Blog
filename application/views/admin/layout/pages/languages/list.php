<div class="post">
		<div class="post_title">
			<h1><?php echo lang('languages'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('languages_description'); ?></p>
			
				<table class="admin">
				<tr>
					<th class="admin"><?php echo lang('th_language'); ?></th>
					<th class="admin"><?php echo lang('th_author'); ?></th>
					<th class="admin"><?php echo lang('th_author_website'); ?></th>
				</tr>
				<?php if ($languages): ?>
					<?php foreach ($languages as $language): ?>
					<tr>
						<td class="admin"><?php echo ucfirst($language['language']); ?> (<?php echo $language['abbreviation']; ?>)</td>
						<td class="admin"><?php echo $language['author']; ?></td>
						<td class="admin"><a href="<?php echo $language['author_website']; ?>" target="_blank"><?php echo $language['author_website']; ?></a></td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
					<td colspan="4"><?php echo lang('no_languages'); ?></td>
					</tr>
				<?php endif; ?>
				</table>
		</div>
</div>